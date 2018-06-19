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
            <input type="submit" class="btn btn-primary btn-sm" value="Buscar" onclick="searchUser(event);">
        </div>
    </div>
</form>
<script type="text/javascript">
    function changePage(obj, e) {
        e.preventDefault();
        var page = $(obj).attr('href').split('page=')[1];
        $.ajax({
            url : table+'?page='+page
        }).done(function (response) {
            $('#content').html(response);
            location.hash = page;
            $('html, body').animate({
                scrollTop: $("#top").offset().top
            }, 250)
        })
    }

    function searchUser(e) {
        e.preventDefault();
        var url = search+$('#search').val()+'/';
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
        $.ajax({
            url : url,
            method : 'get'
        }).done(function (response) {
            table = url;
            $('#content').html(response);
            location.hash = $('#search').val();
        })
    }
</script>