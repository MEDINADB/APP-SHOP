@extends('layouts.app')
@section('title','Bienvenido a App Shop')
@section('body-class', 'landing-page')
@section('styles')
<style>
    .team .row .col-md-4 {
        margin-bottom: 5em;
    }

    .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }

    .row>[class*='col-'] {
        display: flex;
        flex-direction: column;
    }
</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenidos a App Shop.</h1>
                <h4>Realice pedido en linea y contactenos para cordinar la entrega.
                </h4>
                <br />
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> Como funciona
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Porque App Shop?</h2>
                    <h5 class="description">Puede revisar nuestrar relacion completa de productos, comparar precios y
                        realizar pedidos cuando este seguro..</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Atendemos dudas</h4>
                            <p>Atendemos rapidamente cualquier consulta que tengas via Chat. No estas solo.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago Seguro</h4>
                            <p>Todo pedido realizado sera confirmado a travez de una llamada. Si no confias en los pagos
                                en linea puede pagar contra entrega</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Informacion privada</h4>
                            <p>Los pedidos que realice solo los conoceras tu a travez del panel de usuario. Nadie mas
                                podra ver esta informacion..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>

            <div class="team">
                <div class="row ">
                    @foreach($products as $product)
                    <div class="col-md-4 ">
                        <div class="  team-player ">
                            <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>
                                <br />
                                <small class="text-muted">{{$product->category? $product->category->name:'General'}}</small>
                            </h4>
                            <p class="description">{{$product->description}}</p>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{$products->links()}}
                </div>
            </div>

        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Aun no te has registrado?</h2>
                    <h4 class="text-center description">Registrate ingresando tus datos basicos, y podras realizar
                        pedidos a travez de nuestro carrito de compra.
                        Si no te decides, de todas formas, con tu cuenta de usuario podras hacer tu consultas sin
                        compromiso.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu mensaje</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    ENVIAS CONSULTA
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection