function changePage(obj, e) {
    e.preventDefault();
    let page = $(obj).attr('href').split('page=')[1];
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

function loadTable(e, doSearch) {
    e.preventDefault();
    var url;
    if (doSearch)
        url = search+$('#search').val()+'/';
    else
        url = table;
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });
    $.ajax({
        url : url,
        method : 'get'
    }).done(function (response) {
        table = url;
        $('#content').html(response);
        if (doSearch)
            location.hash = $('#search').val();
    })
}