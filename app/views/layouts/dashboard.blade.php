<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>Dashboard</title>
    <!-- Custom styles for this template -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{ stylesheet_link_tag() }}
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">ERP</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Juan Manuel Martinez</a></li>
            <li><a href="#"><i class="icon-big ion-ios-gear"></i></a></li>
            <li><a></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="icon-big ion-printer"></i></a></li>
            <li><a href="#"><i class="icon-big ion-ios-email"></i></a></li>
          </ul>
        </div>
      </div>

    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li>
              <a href="#" data-toggle="collapse" data-target="#N1" aria-expanded="false">
                <i class="ion-arrow-graph-up-right"></i> Sales Order<span class="caret"></span> 
              </a>
              <ul class="nav collapse" id="N1" role="menu">
                <li><a href="{{ route('sales_order.index') }}">Sales Entry</a></li>
                <li><a href="#">Sales List</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#N2" aria-expanded="false">
                <i class="ion-ios-cart"></i> Purchases<span class="caret"></span><!-- ion-pricetag -->
              </a>
              <ul class="nav collapse" id="N2" role="menu">
                <li><a href="{{ route('intransits.po_entry') }}">PO Entry</a></li>
                <li><a href="#">PO List</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#N3" aria-expanded="false">
                <i class="ion-paper-airplane"></i> In transit<span class="caret"></span> <!-- ion-android-send -->
              </a>
              <ul class="nav collapse" id="N3" role="menu">
                <li><a href="{{ route('intransits.index') }}">In-transit Entry</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#N4" aria-expanded="false">
                <i class="ion-stop"></i> Stock<span class="caret"></span> 
              </a>
              <ul class="nav collapse" id="N4" role="menu">
                <li><a href="{{ route('stocks.index') }}">Stock In-Out</a></li>
                <li><a href="#">Stock Query</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#N5" aria-expanded="false">
                <i class="ion-person-stalker"></i> Production<span class="caret"></span> 
              </a>
              <ul class="nav collapse" id="N5" role="menu">
                <li><a href="{{ route('plans.index') }}">Production Plan</a></li>
                <li><a href="#">Production Scheduling</a></li>
                <li><a href="#">Production Result</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#N6" aria-expanded="false">
                <i class="ion-android-bus"></i> Delivery<span class="caret"></span> 
              </a>
              <ul class="nav collapse" id="N6" role="menu">
                <li><a href="#">Delivery Plan</a></li>
                <li><a href="#">Delivery Result</a></li>
                <li><a href="#">Invoice</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#N7" aria-expanded="false">
                <i class="ion-cube"></i> Master Data<span class="caret"></span> 
              </a>
              <ul class="nav collapse" id="N7" role="menu">
                <li><a href="{{ route('item_masters.index') }}">ITEM</a></li>
                <li><a href="{{ route('boms.index') }}">BOM</a></li>
                <li><a href="{{ route('locations.index') }}">LOCATIONS</a></li>
                <li><a href="{{ route('vendors.index') }}">VENDORS</a></li>
                <li><a href="{{ route('customers.index') }}">CUSTOMERS</a></li>
                <li><a href="{{ route('movement_types.index') }}">MOVEMENT TYPES</a></li>
                <li><a href="{{ route('item_units.index') }}">ITEM UNITS</a></li>
                <li><a href="{{ route('item_status.index') }}">ITEM STATUS</a></li>
                <li><a href="{{ route('lines.index') }}">LINES</a></li>
                <li><a href="{{ route('stock_types.index') }}">STOCK TYPE</a></li>
                <li><a href="{{ route('order_categories.index') }}">ORDER CATEGORIES</a></li>
                <li><a href="{{ route('item_types.index') }}">ITEM TYPE</a></li>
                <li><a href="{{ route('ship_methods.index') }}">SHIP METHODS</a></li>

              </ul>
            </li>
            <!-- -->
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ javascript_include_tag() }}
  </body>
</html>