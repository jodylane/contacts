/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/26/2017
 * Time: 12:20 PM
 * Description: This file was created to
 */

$(document).ready(function(){
    $('.modal').modal('hide');
    $('#modalBtn').on('click',function(){
        var fna = $('#fname');
        var lna = $('#lname');
        var use = $('#uname');
        var ema = $('#email');
        var pas = $('#password');
        fna.val('');
        lna.val('');
        ema.val('');
        pas.val('');
        use.val('');
        $('.modal').modal('toggle');
    });
    $('#cancel').on('click', function(event){
        event.preventDefault();
        $('.modal').modal('toggle');
    });
    $('.hover').on('click',function(){
        var name = this.children[0].children[0].textContent;
        swal("You clicked: " + name);
    })


});
