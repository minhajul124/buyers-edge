<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar');
            <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div style="text-align: center; padding-top:40px;">
                            <h2 style="font-size: 40px; padding-bottom:40px;">Add New Product</h2>

                            <form action="{{url('store_product')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              {{method_field('PUT')}}
                              <div style="border: 1px solid white; padding: 20px" >
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="product_title" :value="__('Product Title')" />
                                <input type="text" name="product_title" placeholder="Product Title" Required>
                                <br>
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="product_description" :value="__('Product Description')" />
                                <input type="text" name="product_description" placeholder="Product Description" Required>
                                <br>
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="product_image" :value="__('Product Image')" />
                                <input type="file" name="product_image" Required>
                                <br>
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="product_price" :value="__('Product Price')" />
                                <input type="number" name="product_price" placeholder="Product Price" Required>
                                <br>
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="discount_price" :value="__('Discount Price')" />
                                <input type="number" name="discount_price" placeholder="Discount Price">
                                <br>
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="product_quantity" :value="__('Product Quantity')" />
                                <input type="number" name="product_quantity" min="0" placeholder="Product Quantity" Required>
                                <br>
                                <x-label style="font-size: 20px; padding-bottom:40px;" for="Category" :value="__('Category')" />
                                <select name="category" id="" Required>
                                    @foreach($category as $category)

                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                                    @endforeach
                                </select>
                                <br>
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Product">
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.footer');
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>