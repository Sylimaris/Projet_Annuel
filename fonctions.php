<?php
function createInputText($attr,$label) {
?>
    <div class="row cells4">
        <div class="cell">
            <div class="input-control"><?php echo $label;?></div>
        </div>
        <div class="cell colspan3">
            <div class="input-control text full-size">
                <input type="text" name="<?php echo $attr;?>">
            </div>
        </div>
    </div><br />
<?php
}

function createInputSelect($attr,$label) {
    global $nomtable,$idBase;
?>
    <div class="row cells4">
        <div class="cell">
            <div class="input-control"><?php echo $label;?></div>
        </div>
        <div class="cell colspan3">
            <div class="input-control select full-size">
                <select name="<?php echo $attr;?>">
                    <option value="" disabled selected>Sélectionner un <?php echo $label;?></option>
                    <?php
                    $req = $idBase->query("select distinct $attr from $nomtable order by $attr");
                    while ($res=$req->fetch(PDO::FETCH_OBJ))  echo "<option value=".$res->$attr.">".$res->$attr."</option>";
                    ?>
                </select>
            </div>
        </div>
    </div><br />
<?php
}

function createInputPassword($attr,$label) {
?>
    <div class="row cells4">
        <div class="cell">
            <div class="input-control"><?php echo $label;?></div>
        </div>
        <div class="cell colspan3">
            <div class="input-control text full-size">
                <input type="password" name="<?php echo $attr;?>">
            </div>
        </div>
    </div><br />
<?php
}

function createInputFile($attr,$label) {
?>
	<div class="row cells4">
        <div class="cell">
        	<div class="input-control"><?php echo $label;?></div>
		</div>
        <div class="cell colspan3">
        	<div class="input-control file" data-role="input">
                <input type="file" name="<?php echo $attr;?>">
                <button class="button"><span class="mif-folder"></span></button>
        	</div>
        </div>
    </div><br />
<?php
}

function createInputDate($attr,$label) {
?>
	<div class="row cells4">
        <div class="cell">
        	<div class="input-control"><?php echo $label;?></div>
		</div>
        <div class="cell colspan3">
        	<div class="input-control text" data-role="datepicker">
			    <input type="text" name="<?php echo $attr;?>">
			    <button class="button"><span class="mif-calendar"></span></button>
			</div>
        </div>
    </div><br />
<?php
}

function createRadio($attr,$tab,$label) {
?>
	<div class="row cells4">
        <div class="cell">
        	<div class="input-control"><?php echo $label;?></div>
		</div>
        <div class="cell colspan3">
        	<?php
        	foreach ($tab as $val) {
        		echo "<label class='input-control modern radio'>
				        <input type='radio' name='$attr' value='$val'>
				        <span class='check'></span>
				        <span class='caption'>$val</span>
				    </label>&nbsp;&nbsp;";
			}
			?>
		</div>
	</div>
<?php
}

function createCheckbox($tab,$label) {
?>
	<div class="row cells4">
        <div class="cell">
        	<div class="input-control"><?php echo $label;?></div>
		</div>
        <div class="cell colspan3">
        	<?php
        	foreach ($tab as $cle=>$val) {
        		echo "<label class='input-control modern checkbox'>
				        <input type='checkbox' name='$cle'>
				        <span class='check'></span>
				        <span class='caption'>$val</span>
				    </label>&nbsp;&nbsp;";
			}
			?>
        </div>
    </div><br />
<?php
}

function setInfos($label,$val) {
    echo "<div class='list'>";
    if ($val=="")   $class="fg-red"; else $class="fg-green";
    echo "  <span class='list-title $class'>$label: $val</span>
        </div>";
}

function setGroupInfos($label,$tab) {
    echo "<div class='list-group collapsed'>
            <span class='list-group-toggle'>$label</span>
            <div class='list-group-content'>";
            foreach ($tab as $cle=>$value) {
                echo "<div class='list'>$cle : $value</div>";
            }
    echo "  </div>
        </div>";
}

function add_file($attr_name)
{
    // gestion du fichier
    $_FILES[$attr_name]['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
    $_FILES[$attr_name]['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
    $_FILES[$attr_name]['size'];     //La taille du fichier en octets.
    $_FILES[$attr_name]['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $_FILES[$attr_name]['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
    if ($_FILES[$attr_name]['error'] > 0) $erreur = "Erreur lors du transfert";
    if ($_FILES[$attr_name]['error'] > 0) $erreur = "Erreur lors du transfert";
    $extension_upload = strtolower(  substr(  strrchr($_FILES[$attr_name]['name'], '.')  ,1)  );
    $name = $_FILES[$attr_name]['name'];
    if ($name!="")  $valide=1;
    // else print "pas de fichier";
    if ($valide==1)
        $resultat = move_uploaded_file($_FILES[$attr_name]['tmp_name'],'./'.$name);
}
?>
