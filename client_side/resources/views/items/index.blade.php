@extends('layouts.app')
@section('content')
<div class="container">
    <table  id="items" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>            
        </tbody>
    </table>
<div>
<!--TEMPLATE-->  
    <table class="template tableinfo d-none">
        <tr class ="infobox">
            <td class="items-id"></td>
            <td class="items-title"></td>
            <td class="items-description"></td>
            <td class="items-price"></td>
            <td>
            <button type="button" class="btn btn-primary show-item" data-bs-toggle="modal" data-bs-target="#showmodal" data-itemid="">Show</button>
            <button class="btn btn-secondary edit-item" data-bs-toggle="modal" data-bs-target="#editmodal" data-itemid="">Edit</button>
            <button class="btn btn-danger delete-item" type="submit" data-itemid="">Delete</button>
            </td>
        </tr>
    </table>


<script>
    let csrf= $('meta[name="csrf-token"]').attr('content');
// SHOW SERVER DATA 
    function createRowFromHtml(itemsId, itemsTitle, itemsDescription, itemsPrice) {
        $(".template .items-id").html(itemsId);
        $(".template .items-title").html(itemsTitle);
        $(".template .items-description").html(itemsDescription);
        $(".template .items-price").html(itemsPrice+' €');
        $(".template .show-item").attr('data-itemid', itemsId);
        $(".template .edit-item").attr('data-itemid', itemsId);
        $(".template .delete-item").attr('data-itemid', itemsId);
        return $(".template tbody").html();
    }
    $(document).ready(function() {
    });
        $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/api/items',
            data: {csrf:csrf},
            success: function(data) {
                $('#items tbody').html('');
                $.each(data, function(key, items) {
                    let html;
                    html = createRowFromHtml(items.id, 
                                            items.title, 
                                            items.description, 
                                            items.price);
                    $('#items tbody').append(html);
                });
                 
            }
        });
// CREATE
    $(document).on('click', '#AddAjax', function() {
        let items_title = $('#Title').val();
        let items_description = $('#Description').val();
        let items_price = $('#Price').val();
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/api/items',
            data: {items_title:items_title, 
                  items_description:items_description, 
                  items_price:items_price
            },
            success: function(data) {
                $("#createmodal").hide();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('body').css({overflow:'auto'});
                location.reload();
            }
        });
    });
// EDIT
        $(document).on('click', '.edit-item',function() {
            let itemid;
            itemid = $(this).attr('data-itemid');
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/api/items/' +itemid,
                success: function(data) {
                    $('#EditID').val(data.id);
                    $('#EditTitle').val(data.title);                   
                    $('#EditDescription').val(data.description);                                   
                    $('#EditPrice').val(data.price);
                }
            });
        });
        $(document).on('click', '#UpdateAjax',function() {
            let itemid = $('#EditID').val();
            let items_title = $('#EditTitle').val();
            let items_description = $('#EditDescription').val();
            let items_price = $('#EditPrice').val();
            $.ajax({
                type: 'PUT',
                url: 'http://127.0.0.1:8000/api/items' +itemid,
                data: {items_title:items_title, 
                    items_description:items_description, 
                    items_price:items_price
                },
                success: function(data) {
                    $("#editmodal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({overflow:'auto'});
                    location.reload();
                }
            });       
        });
//VIEW SINGLE
    $(document).on('click', '.show-item', function() {
            let itemid;
            itemid = $(this).attr('data-itemid');
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/api/items/' +itemid,
                success: function(data) {
                    $('.ViewTitle').html(data.title);                   
                    $('.ViewDescription').html(data.description);                                   
                    $('.ViewPrice').html(data.price+' €');                                
                }
            });
        });
//DELETE
    $(document).on('click', '.delete-item',function() {
        let itemid;
        itemid = $(this).attr('data-itemid');
        $.ajax({
            type: 'DELETE',
            url: 'http://127.0.0.1:8000/api/items/' +itemid,
            success: function(data) {
                $('body').css({overflow:'auto'});
                location.reload();
            }
        });
    })


</script>
@endsection