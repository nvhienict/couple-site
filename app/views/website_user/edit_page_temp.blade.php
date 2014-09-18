<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>Nguyen's wedding</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">


    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website.css")}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

    <!-- Navigation -->
    
    <!-- Page Content -->

    @if( !empty($website) )
        @foreach( $website as $website_item )

        <div style="background-image: url({{Asset("{$backgrounds}")}});" class="background-website ">
            <div class="after-image">
                <div class="row navar-page">
                    <nav class="navbar-inverse navbar nav-website-fixed col-xs-12" role="navigation">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Home</a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul style="background-color:#222222;" class="nav navbar-nav">
                                    <li>
                                        <a href="#">Welcome</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Events</a>
                                    </li>
                                    <li>
                                        <a href="#">Traval</a>
                                    </li>
                                    <li>
                                        <a href="#">Accommodations</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container -->
                    </nav>
                </div>
            <div class="row">
            <!-- Page Heading -->
            <div class="col-xs-12 title-website">
                <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >{{WebsiteController::getDates()}}</h2>
                <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                    {{$firstname}}'s wedding
                </h1>
                <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>
            </div>
            </div>
            <hr>  

    <!-- Welcome -->

            @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
            <div class="row section" id="section-welcome{{$tabWeb->id}}">
                <div class="col-xs-12">
                    <div class="row">
                            <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h3>
                        <div class="col-xs-6">
                            <span>
                                <a href="#">
                                <img class="img-responsive" src="{{Asset("images/website/background/{$website_item->background}")}}" alt="">
                                </a>
                            </span>
                            <span>
                                <button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground-images' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                            </span>
                        </div>
                        <div class="col-xs-6">
                                {{$tabWeb->content}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>
                </div>
            </div>
            
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div>
            <hr>
            @endforeach
        </div>    
    </div>     
        
        @endforeach
    @else

        <div style="background-image: url("")" class="background-website ">
            <div class="row">
            <!-- Page Heading -->
            <div class="col-xs-12 title-website">
            
                <h1 class="text-center title-tab" >D/m/yyyy</h1>
                <h3 class="text-center">Wedding</h3>
                <h2 class="text-center" >welcome to website</h2>
            </div>
            </div>
            <hr>  

    <!-- Welcome -->

            <div class="row section" id="section-welcome">
                <div class="col-xs-12">
                    <div class="row">
                            <h3 class="text-center title-tab">Welcome</h3>
                        <div class="col-xs-6">
                            <span>
                                <a href="#">
                                <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                                </a>
                            </span>
                            <span>
                                <button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground-images' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                            </span>
                        </div>
                        <div class="col-xs-6">
                            <h3>Project One</h3>
                            <h4>Subheading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>                   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>
                </div>
            </div>
            
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div>
            <hr>

            <!-- about us -->

            <div class="row section" id="section-about">
                 <div class="col-xs-12">
                    <div class="row">
                        <h3 class="text-center title-tab">About Us</h3>
                        <div class="col-xs-6">
                            <h3>Project Two</h3>
                            <h4>Subheading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                            
                        </div>
                        <div class="col-xs-6">
                            <span>
                                <a href="#">
                                <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                                </a>
                            </span>
                            <span>
                                <button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground-images' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                            </span>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                     </div>
                 </div>
                
            </div>
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div>
            <hr>

            <!-- Wedding Events -->

            <div class="row section " id="section-event">
                <div class="col-xs-12">
                    <div class="row">
                        <h3 class="text-center title-tab">Wedding Events</h3>
                        <div class="col-xs-6">
                            <h3>Project Three</h3>
                            <h4>Subheading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                            
                        </div>
                        <div class="col-xs-6">
                            <span>
                                <a href="#">
                                <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                                </a>
                            </span>
                            <span>
                                <button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground-images' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                            </span>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>                    
                </div>                              
            </div>
            <hr>
           
            <div class="row section">
                <div class="col-xs-12">
                    <div class="row ">
                        <div class="col-xs-6">
                            <span>
                                <a href="#">
                                <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                                </a>
                            </span>
                            <span>
                                <button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground-images' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                            </span>
                        </div>
                            <div class="col-xs-6">
                            <h3>Project Four</h3>
                            <h4>Subheading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>                       
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-11"> </div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>
                </div>               
            </div>
            <hr>
            <div class="row section">
                <div class="col-xs-12">
                    <div  class="row">
                        <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                    </div>                    
                    <div class="row ">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>
                </div>
            </div>
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div>            
            <hr>

           <!--  Travalling -->

            <div class="row section " id="section-traval">
                <div class="col-xs-12">
                    <h3 class="text-center title-tab">Travaling</h3>                            
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                    <div class="row ">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>
                </div>               
            </div>
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div> 
            <hr>
            <div class="row section">
                <div class="col-xs-12">
                    <h3 class="text-center title-tab">Accommodations</h3>                            
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                    <div class="row ">
                        <div class="col-xs-11"></div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div>
                </div>                
            </div>
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div> 
            <hr>

           <!--  Photo album -->

            <div class="row" id="section-album"> 
                <div class="col-xs-12">
                    <div class="row section">
                        <div class="col-xs-12">
                            <div class="row">
                                <div><h3 class="text-center title-tab">Photo Album</h3></div>
                                <div class="col-xs-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                                </div>
                                                        
                                
                            </div>
                            <div class="row ">
                                <div class="col-xs-11">
                                </div>
                                <div class="col-xs-1 edit-content">
                                    <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                                    <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                                </div>               
                            </div>
                         </div>
                    </div> 
                    <div class="row section">
                        <div class="col-xs-12">
                            <div class="row ">
                                <div class="col-xs-12">
                                    <a href=""><img src="">photo1</a>
                                    <a href=""><img src="">photo1</a>
                                    <a href=""><img src="">photo1</a>
                                    <a href=""><img src="">photo1</a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-xs-11">
                                </div>
                                <div class="col-xs-1 edit-content">
                                    <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                                    <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                                </div>               
                            </div>
                        </div>                       
                    </div>      
                </div>         
            </div>
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div>
            <hr>

           <!--  Register -->

            <div class="row section" id="section-register">
                <div class="col-xs-12">
                    <h3 class="text-center title-tab">Register</h3>                            
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                    <div class="row ">
                        <div class="col-xs-11">
                        </div>
                        <div class="col-xs-1 edit-content">
                            <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                        </div>               
                    </div> 
                </div>                
            </div>
            <div class="row add-section text-center">
                <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
            </div> 
            <hr>

            <!-- Contact Us -->

            <div class="row" id="section-contact">
                <div class="col-xs-12">
                    <div class="row section">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="text-center title-tab">Contact Us</h3>                            
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-xs-11">
                                </div>
                                <div class="col-xs-1 edit-content">
                                    <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                                    <span><a class="glyphicon glyphicon-cog" href=""></a></span>
                                </div>               
                            </div>
                        </div>                                      
                    </div> 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6 ">
                                    <form  class="contact-website" action="" method="POST" role="form">
                                   
                                       <div class="form-group">
                                           <label for="">From</label>
                                           <input  type="text" class="form-control" id="" placeholder="Your Name">
                                       </div>
                                       <div class="form-group">
                                           <label for="">Email</label>
                                           <input type="text" class="form-control" id="" placeholder="Email Adress Your">
                                       </div>
                                       <div class="form-group">
                                           <label for="">Subject</label>
                                           <input type="text" class="form-control" id="" placeholder="Subject">
                                       </div>
                                       <div class="form-group">
                                           <label for="">Mesages</label>
                                           <input type="text" class="form-control" id="" placeholder=Messages>
                                       </div>  
                                        <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>   
                                       
                                   </form> 

                                </div>
                                <div class="col-xs-6"></div> 
                            </div>                            
                        </div>  

                    </div>                   
            </div>                 
        </div>  
        <div class="row add-section text-center">
            <button  type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Section</button>
        </div>


        
    @endif   
        <div class="modal fade " id="modal-changebackground-images">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Chọn Ảnh Nền</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-3 menu-image" >
                                <div class="menu-tab-modal">
                                    <ul class="nav nav-pills nav-stacked" id="#my-menu-tab">
                                        <li><a style="text-align:center"data-toggle="tab" href="#tab-modal-edit-1">Upload Ảnh</a></li>
                                        <li class="active"><a style="text-align:center" data-toggle="tab" href="#tab-modal-edit-2">Ảnh Của Tôi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-9 tab-image">
                                <div class="tab-content ">
                                    <div></div>
                                    <div class="tab-pane " id="tab-modal-edit-1">
                                            <div class="upload-image-tab">
                                                    
                                                    <form action="" method="POST" role="form" accept-charset="UTF-8" enctype="multipart/form-data" >
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        
                                                        <div class="form-group">
                                                            <div class="text-center "><img id="image-preview-photo" ></div>
                                                            <div class="text-center"> <a onclick="chose_image()" style="cursor: pointer;" id="chose_image_photo" ><span class="glyphicon glyphicon-picture"></span>Chọn ảnh từ máy tính của bạn</a></div><br><br><br>
                                                            <div class="text-center"><input onchange="show_image_preview_photo(this)"id="input_image_modal_photo" name="input_image_modal_photo"  type="file" class="file" ></div>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" style="float:right"class="btn btn-primary">Upload</button> 
                                                        </div>
                                                        <br>
                                                        <br>
                                                                                                        
                                                                                                                                                                                                                                                                                                                                        
                                                    <script type="text/javascript">
                                                    
                                                        function chose_image()
                                                        {
                                                             $('#input_image_modal_photo').trigger('click');
                                                        };
                                                        function show_image_preview_photo (input) {
                                                                                if (input.files && input.files[0]) {
                                                                                    var filerdr = new FileReader();
                                                                                    filerdr.onload = function(e) {
                                                                                        $('#image-preview-photo').attr('src', e.target.result);
                                                                                    }
                                                                                    filerdr.readAsDataURL(input.files[0]);
                                                                                    }
                                                                                };
                                                    </script>

                                                </form>
                                            </div><br>

                                    </div>
                                    <div class="tab-pane active" id="tab-modal-edit-2">
                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                    </div>
                                </div>                                                                                                                                                  
                            </div>

                        </div>
                        
                    </div>
                    
                            
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        <!-- /.container -->
    </div>

<footer>
    <div class="row">
        <div class="col-xs-12">
            <p class="text-center">Copyright &copy; Your Website 2014</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

<!-- modal get data to add section -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Thêm thành phần</h4>
            </div>
            <table>
                <tr>
                @foreach($arTab as $tab)
                    
                        @if( ($tab->visiable)==1 )
                            <td class="add_section_item_visiable" >
                                <i class="glyphicon glyphicon-asterisk"></i>
                                <p>
                                    {{$tab->title}} <br />
                                    (Đã thêm)
                                </p>
                            </td>
                        @else
                            <td class="add_section_item" onclick="add_section_item({{$tab->id}});" >
                                <i class="glyphicon glyphicon-asterisk"></i>
                                <p>{{$tab->title}}</p>
                            </td>
                        @endif
                    
                @endforeach
                </tr>
            </table>
            
        </div>
    </div>
</div>
<!-- .modal -->

<script type="text/javascript">
    function add_section_item(id_tab)
    {
        $.ajax({
            type:"post",
            url:"{{URL::to('add_section')}}",
            data:{id_tab:id_tab}
        });
    };

</script>
    
</html>
