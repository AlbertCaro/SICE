<form class="form-row" id="search-form">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">search</i>
            </span>
        </div>
        <div class="form-group col-10">
            <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
        </div>
        <div class="form-group col-1">
            <br>
            <input type="submit" class="btn btn-primary btn-sm" value="Buscar" onclick="loadTable(event, true);">
        </div>
    </div>
</form>
<script src="{{ asset('assets/js/pagination.js') }}"></script>