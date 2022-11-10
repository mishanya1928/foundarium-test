
require('./bootstrap');

window.$ = require('jquery');

const select = 'select[name="select-car"]';

$(document).ready(function(){
    $(document).on('change', select, function(e){
        let uid = $(e.target).data('uid');
        let cid = e.target.value;
        $.ajax({
            url: '/api/link/?uid=' + uid + '&cid=' + cid,
            method: 'get',
            type: 'get',
            success: ()=>{
                window.location.reload();
            },
            error: (data)=>{
                alert(data.message);
            }
        })
    })

    $(document).on('click', '.remove', function(e){
        e.preventDefault();
        let link = $(this).attr('href');
        $.ajax({
            url: link,
            method: 'get',
            type: 'get',
            success: ()=>{
                window.location.reload();
            },
            error: ()=>{
                alert('Ошибка');
            }
        })
        return false;
    });
})