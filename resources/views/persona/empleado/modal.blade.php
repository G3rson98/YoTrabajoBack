<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('sancion.store')}}">
                @csrf
                <div class="modal-body">

                    <div class="form-group">                        
                        <input name="persona-id" type="text" class="form-control" id="persona-id" hidden>
                    </div>

                    <div class="form-group">
                        <label>Rango de fechas:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-alt"> </i>
                                </span>
                            </div>
                            <input type="text" name="daterange"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">justificacion:</label>
                        <textarea name="justificacion" class="form-control" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>