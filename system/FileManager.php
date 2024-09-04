<?php

class FileManager
{
    private string $storagePath;

    public function __construct()
    {
        $this->storagePath = '/public/storages';
    }

    public function upload(array $file): string
    {
        // Validação básica do arquivo
        if (!isset($file['tmp_name'], $file['name']) or $file['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('Erro no upload do arquivo.');
        }

        // Definindo os subdiretórios ano/mês/dia
        $subDirectory = date('Y').'/'.date('m').'/'.date('d');
        $destinationDir = $this->storagePath.'/'.$subDirectory;
        
        if (is_dir($destinationDir)) {
            mkdir($destinationDir, 0777, true);
        }

        // Criar diretórios caso não existam
        if (!is_dir($destinationDir) and !mkdir($destinationDir, 0777, true) and !is_dir($destinationDir)) {
            throw new \Exception('Não foi possível criar o diretório de destino.');
        }

        // Definindo o caminho completo do arquivo
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = time().'.'.$fileExtension;
        $destinationPath = $destinationDir.'/'.$fileName;

        // Movendo o arquivo para o destino final
        if (!move_uploaded_file($file['tmp_name'], $destinationPath)) {
            throw new \Exception('Erro ao mover o arquivo para o destino.');
        }

        return $destinationPath;
    }

    public function destroy(string $filePath): bool
    {
        // Verifica se o arquivo existe e tenta excluí-lo
        if (!file_exists($filePath)) {
            throw new \Exception('Arquivo não encontrado.');
        }

        if (!unlink($filePath)) {
            throw new \Exception('Erro ao excluir o arquivo.');
        }

        return true;
    }
}