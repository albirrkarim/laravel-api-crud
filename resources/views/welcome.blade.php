<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    <body>
        <h2>Simple API for User Create, Read, Update, Delete</h2>
        <h4>With Laravel 7 and Jquery</h4>
        <p class="m-0">Nama : AL BIRR KARIM SUSANTO</p>
        <p class="m-0">NIM : A11.2017.10642</p>
        <p class="m-0">Kelompok : A11.4601 Sistem Terdistribusi</p>
        <p class="m-0">Github : <a href="https://github.com/albirrkarim" target="_blank">https://github.com/albirrkarim</a></p>
        
        <div class="container mt-5 bg-light shadow  p-3">
            <div class="row">
                <div class="col">
                    <h5>List user</h5>
                    <div id="refresh">
                
                    </div>
                </div>
                <div class="col">
                    <h5>Form create / update</h5>
                    <form id="formAJAX" action="{{ route("user.store") }}" method="post">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <input class="form-control" required type="text" placeholder="name" name="name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="email" placeholder="email" name="email">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        
        

        <script>
            function refreshData(){
                $.get("api/refresh",function (data, textStatus, jqXHR) {
                    $("#refresh").html(data);
                    $("#formAJAX").attr("action","api/store");
                    $("#formAJAX").trigger("reset");
                });
            }

            var APICONTROLL={
                update:function(ev){
                    var btn = ev.srcElement;

                    $("#formAJAX").attr("action","api/update");

                    $("[name=id]").val($(btn).attr("user_id"));
                    $("[name=name]").val($(btn).attr("user_name"));
                    $("[name=email]").val($(btn).attr("user_email"));
                },
                delete:function(ev){
                    var btn = ev.srcElement;
                    $.get("api/delete/"+$(btn).attr("user_id"),function (data, textStatus, jqXHR) {
                        refreshData();
                    });
                }
            }

            $(document).ready(function () {
                refreshData();

                $("#formAJAX").on("submit", function (e) {
                    e.preventDefault();
                   $.ajax({
                        type: $(this).attr("method"),
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success: function (response) {
                            alert(response);
                            refreshData();
                        },
                        error: function (data) {
                            console.log('An error occurred.');
                            console.log(data);
                            alert(data);
                            refreshData();
                        },
                   }); 

                });
            });
        </script>
        
    </body>
</html>
