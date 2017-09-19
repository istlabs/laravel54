<html>
    <head>
        <title>
            Laravel CRUD Application using Ajax without Reloading Page
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        </link>
        <meta content="{!! csrf_token() !!}" name="_token"/>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Laravel CRUD Application using Ajax without Reloading Page
                    <button class="btn btn-default pull-right" id="btn_add" name="btn_add">
                        Add New Product
                    </button>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                            @foreach ($products as $product)
                            <tr id="product{{$product->id}}">
                                <td>
                                    {{$product->id}}
                                </td>
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{$product->details}}
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Product
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="frmProducts" name="frmProducts" novalidate="">
                                <div class="form-group error">
                                    <label class="col-sm-3 control-label" for="inputName">
                                        Name
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control has-error" id="name" name="name" placeholder="Product Name" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputDetail">
                                        Details
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="details" name="details" placeholder="details" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btn-save" type="button" value="add">
                                Save changes
                            </button>
                            <input id="product_id" name="product_id" type="hidden" value="0">
                            </input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <script src="{{asset('js/ajaxscript.js')}}">
        </script>
    </body>
</html>