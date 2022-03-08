$(function (){
    $("button#btnUpdate").on('click', function (e){
        e.preventDefault();
        $("#inputStatus").val("update");
        $.ajax({
            type: 'post',
            url: 'changeClassStatus.php'
        });
    }
}
