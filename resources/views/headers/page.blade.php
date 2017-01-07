<div class="col-lg-12">
                    <h1 class="page-header">@yield('encabezado')</h1>
                    <!--  inicio-flash message -->            
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <div class="alert alert-{{ $msg }} alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>{{ Session::get('alert-' . $msg) }}</h4>
                                </div>
                        @endif    
                    @endforeach
    
                                
                            
                </div>
                    </div>     

                <!-- end .flash-message -->    
                </div>
