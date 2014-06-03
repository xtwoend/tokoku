<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        {{ Theme::asset()->styles() }}
        {{ Theme::asset()->scripts() }}
    </head>
    <body class="skin-blue">
        
        {{ Theme::partial('header') }}
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                
                {{ Theme::partial('sidebar') }}
            
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        {{ Theme::get('title') }}

                        <small>{{ Theme::get('subtitle') }}</small>
                    
                    </h1>

                    {{ Theme::breadcrumb()->render() }}
                
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    {{ Theme::content() }}

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        {{ Theme::partial('footer') }}

        {{ Theme::asset()->container('footer')->scripts() }}
    </body>
</html>