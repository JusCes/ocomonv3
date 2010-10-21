
	<li><a class="qmparent" href="invmon/geral/abertura.php" target="centro"><?php echo $TRANS['MENU_INVENTARY']?></a>

		<ul>
		<li><a class="qmparent" href="javascript:void(0);" target="centro"><?php echo $TRANS['INVENTARY_SUBSCRIBE']?></a>

			<ul>
			<li><a href="invmon/geral/incluir_computador.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_EQUIPMENT']?></a></li>
			<li><a href="invmon/geral/documentos.php?action=incluir&cellStyle=true" target="centro"><?php echo $TRANS['MENU_INVENTARY_DOCUMENT']?></a></li>
			<li><a href="invmon/geral/estoque.php?action=incluir&cellStyle=true" target="centro"><?php echo $TRANS['MENU_INVENTARY_COMPONENT']?></a></li>
			</ul></li>

		<li><a class="qmparent" href="javascript:void(0);" target="centro"><?php echo $TRANS['MENU_INVENTARY_VIEW']?></a>

			<ul>
			<li><a href="invmon/geral/mostra_consulta_comp.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_EQUIPMENT']?></a></li>
			<li><a href="invmon/geral/documentos.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_DOCUMENT']?></a></li>
			<li><a href="invmon/geral/estoque.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_COMPONENT']?></a></li>
			</ul></li>

		<li><a class="qmparent" href="javascript:void(0);" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT']?></a>

			<ul>
			<li><a href="invmon/geral/consulta_inv.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT_FAST']?></a></li>
			<li><a href="invmon/geral/consulta_comp.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT_SPECIAL']?></a></li>
			<li><a href="invmon/geral/estoque.php?action=search&cellStyle=true.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT_COMPONENTS']?></a></li>
			<li><a href="invmon/geral/consulta_hist_inv.php?from_menu=1" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT_LABEL']?></a></li>
			<li><a href="invmon/geral/Consulta_hist_local.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT_BEFORE']?></a></li>
			<li><a href="invmon/geral/relatorios.php" target="centro"><?php echo $TRANS['MENU_INVENTARY_CONSULT_STATISTICS']?></a></li>
			</ul></li>

		</ul></li>

