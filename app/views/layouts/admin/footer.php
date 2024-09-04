        </div>

        <div class="container-fluid bg-white">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center">
                    <span class="text-body-secondary">
                        Copyright © <?= date('Y'); ?>, <?= APP_NAME; ?>. Todos os direitos reservados.
                    </span>
                </div>
            </footer>
        </div>
    </div>

    <script>
        $(function(){
            $('.money').mask("#.##0,00", {reverse: true});
        });
    </script>
</body>
</html>