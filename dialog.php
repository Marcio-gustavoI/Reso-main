<?php
function Confirma($msg, $pagina)
{
    print '
        <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body text-center font-weight-bold text-success">
                        <h4>' . $msg . '</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success mx-auto" onclick="redirecionar()">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function redirecionar() {
                location.href = "' . $pagina . '";
            }
        </script>
    ';
}

function Erro($msg)
{
    print '
        <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body text-center font-weight-bold text-danger">
                        <h4>' . $msg . '</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger mx-auto" onclick="redirecionar()">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function redirecionar() {
                history.go(-1);
            }
        </script>
    ';
}

include_once 'footer.php';
?>
<style>
    .myModal .modal-body {
        height: 370px;
    }

    i {
        font-size: 44pt;
    }
</style>
<script>
    $(document).ready(function () {
        $('#myModal').modal('show');
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus');
    });
</script>