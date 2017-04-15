<style type="text/css">
	.twPc-div {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #e1e8ed;
    border-radius: 6px;
    height: 200px;
    max-width: 340px; // orginal twitter width: 290px;
}
.twPc-bg {
    background-image: url("http://users.wpi.edu/~jta/images/sigma.jpg");
    background-position: 0 50%;
    background-size: 100% auto;
    border-bottom: 1px solid #e1e8ed;
    border-radius: 4px 4px 0 0;
    height: 95px;
    width: 100%;
}
.twPc-block {
    display: block !important;
}
.twPc-button {
    margin: -35px -10px 0;
    text-align: right;
    width: 100%;
}
.twPc-avatarLink {
    background-color: #fff;
    border-radius: 6px;
    display: inline-block !important;
    float: left;
    margin: -30px 5px 0 8px;
    max-width: 100%;
    padding: 1px;
    vertical-align: bottom;
}
.twPc-avatarImg {
    border: 2px solid #fff;
    border-radius: 7px;
    box-sizing: border-box;
    color: #fff;
    height: 72px;
    width: 72px;
}
.twPc-divUser {
    margin: 5px 0 0;
}
.twPc-divName {
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
}
.twPc-divName a {
    color: inherit !important;
}
.twPc-divStats {
    margin-left: 11px;
    padding: 10px 0;
}
.twPc-Arrange {
    box-sizing: border-box;
    display: table;
    margin: 0;
    min-width: 100%;
    padding: 0;
    table-layout: auto;
}
ul.twPc-Arrange {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.twPc-ArrangeSizeFit {
    display: table-cell;
    padding: 0;
    vertical-align: top;
}
.twPc-ArrangeSizeFit a:hover {
    text-decoration: none;
}
.twPc-StatValue {
    display: block;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.15s ease-in-out 0s;
    color: blue;
}
.twPc-StatLabel {
    color: #8899a6;
    font-size: 10px;
    letter-spacing: 0.02em;
    overflow: hidden;
    text-transform: uppercase;
    transition: color 0.15s ease-in-out 0s;
}

.twPc-StatValue:hover, .twPc-StatValue:focus {
    color: #2a6496;
}
.twPc-StatValue {
    color: #428bca;
}

</style>
<div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

	<div>

		<a title="Cambiar Imagen" href="" class="twPc-avatarLink" data-target="#modal-matetoon" data-toggle="modal">  
            @if(DB::table('matetoons')->where('user_id', Laratrust::user()->id)->first())
                <img alt="MateTOON" src="{{DB::table('matetoons')->where('user_id', Laratrust::user()->id)->first()->imagen}}" class="twPc-avatarImg">
            @else
			     <img alt="MateTOON" src="https://lh3.googleusercontent.com/-pp7SnnO7bWo/U6N4BC_b82I/AAAAAAAAEsg/uVDOxLXUKhU/s1600/caricature-isaac-newton.png" class="twPc-avatarImg">
            @endif     
		</a>

		<div class="twPc-divUser">
			<div class="twPc-divName" @if(strlen(DB::table('users')->where('id', Laratrust::user()->id)->first()->name)>15) style="font-size: 16px; @endif
            ">
				{{DB::table('users')->where('id', Laratrust::user()->id)->first()->name}}

				@if(!DB::table('perfils')->where('user_id', Laratrust::user()->id))
				<small><i>
				({{DB::table('perfils')->where('user_id', Laratrust::user()->id)->first()->apodo}})
			    </i></small>
                @else
                <br>
                #{{$ranking}}
                <hr>
                @endif
			</div>
		</div>

		<div class="twPc-divStats">
			<ul class="twPc-Arrange">
				<li class="twPc-ArrangeSizeFit">
						<span class="twPc-StatLabel twPc-block">Nivel</span>
						<span class="twPc-StatValue">{{DB::table('experiencias')->where('user_id', Laratrust::user()->id)->first()->nivel}}</span>
				</li>
				<li class="twPc-ArrangeSizeFit">
					<a href="https://twitter.com/mertskaplan/following" title="Puntos">
						<span class="twPc-StatLabel twPc-block">Puntos</span>
						<span class="twPc-StatValue">{{DB::table('experiencias')->where('user_id', Laratrust::user()->id)->first()->puntos_nivel}}</span>
					</a>
				</li>
				<li class="twPc-ArrangeSizeFit">
					<a href="https://twitter.com/mertskaplan/followers" title="Titulo">
						<span class="twPc-StatLabel twPc-block">Titulo</span>
						<span class="twPc-StatValue">{{DB::table('titulo_users')->where('user_id',Laratrust::user()->id)->join('titulos as t','t.id','=', 'titulo_users.titulo_id')->
       select('t.nombre')->get()->last()->nombre}}</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- 

code end -->

