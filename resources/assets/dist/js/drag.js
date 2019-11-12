var changePosition = function (requestData) {
    requestData._token = $('meta[name="csrf-token"]').attr('content');
    requestData.table=table
    $.ajax({
        'url': sort_url,
        'type': 'POST',
        'data': requestData,
        'success': function (data) {
            console.log(data);

            if (data.success) {
                console.log('success');
            } else {
                console.log('some logic error');
            }
        },
        'error': function () {
            console.log('Request error');
        }
    });
};

$(function () {
    var i = $(".table").sortable({
        containerSelector: 'table',
        itemPath: '> tbody',
        itemSelector: 'tr',
        placeholder: '<tr class="placeholder"/>',
        onDrop: function ($item, container, _super) {
            $item.removeClass(container.group.options.draggedClass).removeAttr("style")
            $("body").removeClass(container.group.options.bodyClass)

            let $previous = $item.prev();
            let $next = $item.next();

            console.log('$item: ' + Number($item.find('.'+column).html()));
            console.log('$previous: ' + Number($previous.find('.'+column).html()));
            console.log('$next: ' + Number($next.find('.'+column).html()));

            if ($previous.length > 0) {
                changePosition({
                    type: 'moveAfter',
                    id: Number($item.find('.'+column).html()),
                    positionEntityId: Number($previous.find('.'+column).html())
                });
            } else if ($next.length > 0) {
                changePosition({
                    type: 'moveBefore',
                    id: Number($item.find('.'+column).html()),
                    positionEntityId: Number($next.find('.'+column).html())
                });
            } else {
                console.log('something wrong');
            }
        }
    });
    console.log(i)
});
