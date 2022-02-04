
$('#customerStoreBtn').click(function(e){
    e.preventDefault();
    let name = $('#name').val();
    let email = $('#email').val();
    let number = $('#number').val();
    
    $.ajax({
        type:'post',
        url:'create/store',
        data:{name:name,email:email,number:number},
        dataType:JSON,
        success:function(response){
            alert(response);
        }
    })
})