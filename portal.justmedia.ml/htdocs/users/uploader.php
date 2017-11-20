<?php
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php
//PHP Goes Here!
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
					<h1>File Uploader</h1>



					<!-- Content Goes Here. Class width can be adjusted -->
					<!-- End of main content section -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->

	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Please upload your files here</strong></div>
			<div class="panel-body">Please be aware that large files can cause issues on our end, so please split files to
				reduce crashes, and to keep our servers running smooth.
			</div>

			<div class="col-md-15">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Uploader</strong></div>
					<div class="panel-body">



						<head>
						    <title>File Uploader</title>
						    <meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8">
						    <style>
						        p.result {
						          margin: 0px;
						          padding: 0px;
						        }
						        fieldset {
						          width: 45%;
						          margin: 15px 0px 25px 0px;
						          padding: 15px;
						        }
						        fieldset.left {
						          float: left;
						          clear: left;
						        }
						        fieldset.right {
						          float: right;
						          clear: right;
						        }
						        legend {
						          font-weight: bold;
						        }
						        .button {
						          text-align: right;
						        }
						        .button input {
						          font-weight: bold;
						        }

						        #dnd_drag {
						          display: none;
						          text-align: center;
						          padding: 1em 0;
						          margin: 1em 0;
						          color: #555;
						          border: 2px dashed #888;
						          border-radius: 7px;
						          cursor: default;
						        }
						        #dnd_drag.hover {
						          border: 2px dashed #000;
						        }

						        #xhr_status, #dnd_status {
						          font-size: 90%;
						          font-style: italic;
						        }
						    </style>

						</head>

						<body>

						    <h1>File Upload</h1>

						    <fieldset class="left">
						        <legend>Simple upload</legend>
						        <p>Pick up a file to upload, and press "upload" </p>
						        <form name="form1" enctype="multipart/form-data" method="post" action="upload.php" />
						            <p><input type="file" size="32" name="my_field" value="" /></p>
						            <p class="button"><input type="hidden" name="action" value="simple" />
						            <input type="submit" name="Submit" value="upload" /></p>
						        </form>
						    </fieldset>

						    <!--<fieldset class="right">
						        <legend>Image upload</legend>
						        <p>Pick up an image to upload, and press "upload" </p>
						        <form name="form2" enctype="multipart/form-data" method="post" action="upload.php" />
						            <p><input type="file" size="32" name="my_field" value="" /></p>
						            <p class="button"><input type="hidden" name="action" value="image" />
						            <input type="submit" name="Submit" value="upload" /></p>
						        </form>
						    </fieldset>

						    <fieldset class="left">
						        <legend>XMLHttpRequest upload</legend>
						        <p>Pick up one file to upload, and press "upload" </p>
						        <form name="form5" enctype="multipart/form-data" method="post" action="upload.php" />
						            <p><input type="file" size="32" name="my_field" value="" id="xhr_field" /></p>
						            <div id="xhr_status"></div>
						            <p class="button"><input type="hidden" name="action" value="xhr" />
						            <input type="submit" name="Submit" value="upload" id="xhr_upload"/></p>
						        </form>
						        <div id="xhr_result"></div>
						    </fieldset>

						    <fieldset class="right">
						        <legend>HTML5 File Drag &amp; Drop API</legend>
						        <p>Drag and drop one file to upload, and press "upload" </p>
						        <form name="form5" enctype="multipart/form-data" method="post" action="upload.php" />
						            <p><input type="file" size="32" name="my_field" value="" id="dnd_field" /></p>
						            <div id="dnd_drag">... drag and drop here ...</div>
						            <div id="dnd_status"></div>
						            <p class="button"><input type="hidden" name="action" value="xhr" />
						            <input type="submit" name="Submit" value="upload" id="dnd_upload"/></p>
						        </form>
						        <div id="dnd_result"></div>
						    </fieldset> -->

						    <fieldset class="left">
						        <legend>Multiple upload</legend>
						        <p>Pick up some files to upload, and press "upload" </p>
						        <form name="form3" enctype="multipart/form-data" method="post" action="upload.php">
						            <p><input type="file" size="32" name="my_field[]" value="" /></p>
						            <p><input type="file" size="32" name="my_field[]" value="" /></p>
						            <p><input type="file" size="32" name="my_field[]" value="" /></p>
						            <p class="button"><input type="hidden" name="action" value="multiple" />
						            <input type="submit" name="Submit" value="upload" /></p>
						        </form>
						    </fieldset>

						<!--<fieldset class="right">
						        <legend>Image local manipulation</legend>
						        <p>Enter a local file name (absolute or relative) for a small image, and press "process" </p>
						        <form name="form4" enctype="multipart/form-data" method="post" action="upload.php" />
						            <p><input type="text" size="32" name="my_field" value="test.png" /></p>
						            <p class="button"><input type="hidden" name="action" value="local" />
						            <input type="submit" name="Submit" value="process" /></p>
						        </form>
						    </fieldset>

						    <fieldset class="left">
						        <legend>Base64-encoded image data</legend>
						        <p>Copy here base64-encoded file data, and press "process" </p>
						        <form name="form6" enctype="multipart/form-data" method="post" action="upload.php" />
						            <p><textarea cols="32" name="my_field">iVBORw0KGgoAAAANSUhEUgAAACUAAAARCAYAAABadWW4AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAC4jAAAuIwF4pT92AAAAB3RJTUUH4AoBFik0VcV6egAAALpJREFUSMftlk0KwyAUhMfSTRDP4ybkFgGPqSRHUvAW001TWpqnFgykkIG3iT/fqGNQkSROphtOqJcppdRHGWMwTRPWdf0atPWRJLU3M/gUALFCCHzX9l2S1N7KgDRRjJHzPBMArbVdTdUYKE2UcyYADsNwiCmJUQx6KTe9tMuQVpFSonOueHy1qu2UxGgKuve+q6kaQzSlteY4jlyWpTkzv94+iXHfOc7Dc1RjnPuPfpn6R1Pqero06gEPaFNPl21bvgAAAABJRU5ErkJggg==</textarea></p>
						            <p class="button"><input type="hidden" name="action" value="base64" />
						            <input type="submit" name="Submit" value="process" /></p>
						        </form>
						    </fieldset> -->

						    <script type="text/javascript">

						    window.onload = function () {

						      function xhr_send(f, e) {
						        if (f) {
						          xhr.onreadystatechange = function(){
						            if(xhr.readyState == 4){
						              document.getElementById(e).innerHTML = xhr.responseText;
						            }
						          }
						          xhr.open("POST", "upload.php?action=xhr");
						          xhr.setRequestHeader("Cache-Control", "no-cache");
						          xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
						          xhr.setRequestHeader("X-File-Name", f.name);
						          xhr.send(f);
						        }
						      }

						      function xhr_parse(f, e) {
						        if (f) {
						          document.getElementById(e).innerHTML = "File selected : " + f.name + "(" + f.type + ", " + f.size + ")";
						        } else {
						          document.getElementById(e).innerHTML = "No file selected!";
						        }
						      }

						      function dnd_hover(e) {
						        e.stopPropagation();
						        e.preventDefault();
						        e.target.className = (e.type == "dragover" ? "hover" : "");
						      }

						      var xhr = new XMLHttpRequest();

						      if (xhr && window.File && window.FileList) {

						        // xhr example
						        var xhr_file = null;
						        document.getElementById("xhr_field").onchange = function () {
						          xhr_file = this.files[0];
						          xhr_parse(xhr_file, "xhr_status");
						        }
						        document.getElementById("xhr_upload").onclick = function (e) {
						          e.preventDefault();
						          xhr_send(xhr_file, "xhr_result");
						        }

						        // drag and drop example
						        var dnd_file = null;
						        document.getElementById("dnd_drag").style.display = "block";
						        document.getElementById("dnd_field").style.display = "none";
						        document.getElementById("dnd_drag").ondragover = function (e) {
						          dnd_hover(e);
						        }
						        document.getElementById("dnd_drag").ondragleave = function (e) {
						          dnd_hover(e);
						        }
						        document.getElementById("dnd_drag").ondrop = function (e) {
						          dnd_hover(e);
						          var files = e.target.files || e.dataTransfer.files;
						          dnd_file = files[0];
						          xhr_parse(dnd_file, "dnd_status");
						        }
						        document.getElementById("dnd_field").onchange = function (e) {
						          dnd_file = this.files[0];
						          xhr_parse(dnd_file, "dnd_status");
						        }
						        document.getElementById("dnd_upload").onclick = function (e) {
						          e.preventDefault();
						          xhr_send(dnd_file, "dnd_result");
						        }

						      }
						    }
						    </script>

						</body>

						</html>





					</div>
		</div><!-- /panel -->
	</div><!-- /.col -->
</div> <!-- /.wrapper -->


	<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
