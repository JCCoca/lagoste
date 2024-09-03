<?php

class DataTableRepository
{
    protected Connection $connection;
    protected string $table;
    protected bool $softDelete;

    protected int $draw;
    protected int $start;
    protected int $length;
    protected ?string $search;
    protected array $columns;
    protected int $orderColumn;
    protected string $orderDir;

    protected array $columnName;
    protected string $searchConditions;

    protected object $formatData;
    
    public function __construct(array $request, string $table, bool $softDelete = false)
    {
        $this->connection = new Connection();
        $this->table = $table;
        $this->softDelete = $softDelete;

        $this->draw = (int) filter_var(@$request['draw'], FILTER_VALIDATE_INT) ?? 1;
        $this->start = (int) filter_var(@$request['start'], FILTER_VALIDATE_INT) ?? 0;
        $this->length = (int) filter_var(@$request['length'], FILTER_VALIDATE_INT) ?? 10;
        $this->search = htmlspecialchars(strip_tags(@$request['search']['value']), ENT_QUOTES, 'UTF-8') ?? '';
        $this->columns = (array) @$request['columns'] ?? [];
        $this->orderColumn = (int) filter_var(@$request['order'][0]['column'], FILTER_VALIDATE_INT) ?? 0;
        $this->orderDir = htmlspecialchars(strip_tags(@$request['order'][0]['dir']), ENT_QUOTES, 'UTF-8') ?? 'asc';

        $this->columnName = [];

        $columns = [];
        foreach ($this->columns as $column) {
            $this->columnName[] = ($column['orderable'] == 'true') ? $column['name'] : '';
            
            if ($column['searchable'] == 'true' and !empty($column['name'])) {
                $columns[] = $column['name'];
            }
        }

        $this->searchConditions = implode(' OR ', array_map(fn($col) => "{$col} LIKE :search", $columns));
    }

    public function setColumnName(array $columnName): void
    {
        $this->columnName = $columnName;
    }

    public function formatData(object $formatData): void
    {
        $this->formatData = $formatData;
    }

    public function get(): array
    {
        $totalQuery = $this->connection->query("SELECT COUNT(*) AS total FROM {$this->table}");
        $totalRecords = $totalQuery->fetch()->total;

        $sql = "SELECT * FROM {$this->table} WHERE 1 = 1";

        if ($this->softDelete) {
            $sql .= " AND excluido_em IS NULL";
        }

        if (!empty($this->search)) {
            $sql .= " AND ({$this->searchConditions})";
        }

        $sql .= " ORDER BY {$this->columnName[$this->orderColumn]} {$this->orderDir} LIMIT :length OFFSET :start";

        $stmt = $this->connection->prepare($sql);

        if (!empty($this->search)) {
            $stmt->bindValue(':search', '%'.$this->search.'%', PDO::PARAM_STR);
        }
        $stmt->bindValue(':start', $this->start, PDO::PARAM_INT);
        $stmt->bindValue(':length', $this->length, PDO::PARAM_INT);

        $stmt->execute();
        
        $result = $stmt->fetchAll();
        $formatData = $this->formatData ?? null;
        $data = [];

        if (!empty($formatData)) {
            foreach ($result as $key => $value) {
                $data[] = $formatData($value, $key);
            }
        } else {
            foreach ($result as $key => $value) {
                $data[] = $value;
            }
        }

        return [
            "draw" => intval($this->draw),
            "recordsTotal" => intval($totalRecords),
            "recordsFiltered" => empty($search) ? intval($totalRecords) : intval($stmt->rowCount()),
            "data" => $data
        ];
    }
}
