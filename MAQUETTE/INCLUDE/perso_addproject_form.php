
<!-- Formulaire pour ajouter un nouveau projet 
		Il apparait lorsque l'on clic sur le +
-->

<div class="col-xs-12 col-sm-9 col-md-9 col-lg-3 col-lg-offset">
	<div  class="project" >
			<!-- Form Name -->
			<legend>Start your own project !</legend>

			<form class="form-horizontal">
			<fieldset>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="textinput">Nouveau projet</label>  
			  <div class="col-md-12">
			  <input id="textinput" name="textinput" type="text" placeholder="Mon projet" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="textarea">Description</label>
			  <div class="col-md-12">                     
			    <textarea class="form-control" id="textarea" name="textarea">Rejoignez mon super projet !</textarea>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-12 control-label" for="selectbasic">Visibilitée</label>
			  	<div class="col-md-12">
			    	<select id="selectbasic" name="selectbasic" class="form-control">
				      	<option value="1">Publique</option>
				      	<option value="2">Privé</option>
			    	</select>
			  </div>
			</div>
			<a href="#"><i class="fa fa-plus fa-5x"></i></a>
		  </fieldset>
		</form>
	</div>
</div>
