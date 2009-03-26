<?php /* Smarty version 2.6.0, created on 2009-03-26 16:00:16
         compiled from var.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'var.tpl', 4, false),array('modifier', 'replace', 'var.tpl', 11, false),)), $this); ?>
<?php if (isset($this->_sections['vars'])) unset($this->_sections['vars']);
$this->_sections['vars']['name'] = 'vars';
$this->_sections['vars']['loop'] = is_array($_loop=$this->_tpl_vars['vars']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vars']['show'] = true;
$this->_sections['vars']['max'] = $this->_sections['vars']['loop'];
$this->_sections['vars']['step'] = 1;
$this->_sections['vars']['start'] = $this->_sections['vars']['step'] > 0 ? 0 : $this->_sections['vars']['loop']-1;
if ($this->_sections['vars']['show']) {
    $this->_sections['vars']['total'] = $this->_sections['vars']['loop'];
    if ($this->_sections['vars']['total'] == 0)
        $this->_sections['vars']['show'] = false;
} else
    $this->_sections['vars']['total'] = 0;
if ($this->_sections['vars']['show']):

            for ($this->_sections['vars']['index'] = $this->_sections['vars']['start'], $this->_sections['vars']['iteration'] = 1;
                 $this->_sections['vars']['iteration'] <= $this->_sections['vars']['total'];
                 $this->_sections['vars']['index'] += $this->_sections['vars']['step'], $this->_sections['vars']['iteration']++):
$this->_sections['vars']['rownum'] = $this->_sections['vars']['iteration'];
$this->_sections['vars']['index_prev'] = $this->_sections['vars']['index'] - $this->_sections['vars']['step'];
$this->_sections['vars']['index_next'] = $this->_sections['vars']['index'] + $this->_sections['vars']['step'];
$this->_sections['vars']['first']      = ($this->_sections['vars']['iteration'] == 1);
$this->_sections['vars']['last']       = ($this->_sections['vars']['iteration'] == $this->_sections['vars']['total']);
 if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['static']): ?>
<a name="var<?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_name']; ?>
" id="<?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_name']; ?>
"><!-- --></A>
<div class="<?php echo smarty_function_cycle(array('values' => "evenrow,oddrow"), $this);?>
">

	<div class="var-header">
		<img src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['access'] == 'private'): ?>PrivateVariable<?php else: ?>Variable<?php endif; ?>.png" />
		<span class="var-title">
			static <span class="var-type"><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_type']; ?>
</span>
			<span class="var-name"><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_name']; ?>
</span>
			<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_default']): ?> = <span class="var-default"><?php echo ((is_array($_tmp=$this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_default'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br />") : smarty_modifier_replace($_tmp, "\n", "<br />")); ?>
</span><?php endif; ?>
			(line <span class="line-number"><?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['slink']):  echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['slink'];  else:  echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['line_number'];  endif; ?></span>)
		</span>
	</div>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "docblock.tpl", 'smarty_include_vars' => array('sdesc' => $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['sdesc'],'desc' => $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['desc'],'tags' => $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['tags'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
	
	<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']): ?>
		<hr class="separator" />
		<div class="notes">Redefinition of:</div>
		<dl>
			<dt><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']['link']; ?>
</dt>
			<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']['sdesc']): ?>
			<dd><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']['sdesc']; ?>
</dd>
			<?php endif; ?>
		</dl>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar']): ?>
		<hr class="separator" />
		<div class="notes">Redefined in descendants as:</div>
		<ul class="redefinitions">
		<?php if (isset($this->_sections['vm'])) unset($this->_sections['vm']);
$this->_sections['vm']['name'] = 'vm';
$this->_sections['vm']['loop'] = is_array($_loop=$this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vm']['show'] = true;
$this->_sections['vm']['max'] = $this->_sections['vm']['loop'];
$this->_sections['vm']['step'] = 1;
$this->_sections['vm']['start'] = $this->_sections['vm']['step'] > 0 ? 0 : $this->_sections['vm']['loop']-1;
if ($this->_sections['vm']['show']) {
    $this->_sections['vm']['total'] = $this->_sections['vm']['loop'];
    if ($this->_sections['vm']['total'] == 0)
        $this->_sections['vm']['show'] = false;
} else
    $this->_sections['vm']['total'] = 0;
if ($this->_sections['vm']['show']):

            for ($this->_sections['vm']['index'] = $this->_sections['vm']['start'], $this->_sections['vm']['iteration'] = 1;
                 $this->_sections['vm']['iteration'] <= $this->_sections['vm']['total'];
                 $this->_sections['vm']['index'] += $this->_sections['vm']['step'], $this->_sections['vm']['iteration']++):
$this->_sections['vm']['rownum'] = $this->_sections['vm']['iteration'];
$this->_sections['vm']['index_prev'] = $this->_sections['vm']['index'] - $this->_sections['vm']['step'];
$this->_sections['vm']['index_next'] = $this->_sections['vm']['index'] + $this->_sections['vm']['step'];
$this->_sections['vm']['first']      = ($this->_sections['vm']['iteration'] == 1);
$this->_sections['vm']['last']       = ($this->_sections['vm']['iteration'] == $this->_sections['vm']['total']);
?>
			<li>
				<?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar'][$this->_sections['vm']['index']]['link']; ?>

				<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar'][$this->_sections['vm']['index']]['sdesc']): ?>
				: <?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar'][$this->_sections['vm']['index']]['sdesc']; ?>

				<?php endif; ?>
			</li>
		<?php endfor; endif; ?>
		</ul>
	<?php endif; ?>	

</div>
<?php endif;  endfor; endif; ?>

<?php if (isset($this->_sections['vars'])) unset($this->_sections['vars']);
$this->_sections['vars']['name'] = 'vars';
$this->_sections['vars']['loop'] = is_array($_loop=$this->_tpl_vars['vars']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vars']['show'] = true;
$this->_sections['vars']['max'] = $this->_sections['vars']['loop'];
$this->_sections['vars']['step'] = 1;
$this->_sections['vars']['start'] = $this->_sections['vars']['step'] > 0 ? 0 : $this->_sections['vars']['loop']-1;
if ($this->_sections['vars']['show']) {
    $this->_sections['vars']['total'] = $this->_sections['vars']['loop'];
    if ($this->_sections['vars']['total'] == 0)
        $this->_sections['vars']['show'] = false;
} else
    $this->_sections['vars']['total'] = 0;
if ($this->_sections['vars']['show']):

            for ($this->_sections['vars']['index'] = $this->_sections['vars']['start'], $this->_sections['vars']['iteration'] = 1;
                 $this->_sections['vars']['iteration'] <= $this->_sections['vars']['total'];
                 $this->_sections['vars']['index'] += $this->_sections['vars']['step'], $this->_sections['vars']['iteration']++):
$this->_sections['vars']['rownum'] = $this->_sections['vars']['iteration'];
$this->_sections['vars']['index_prev'] = $this->_sections['vars']['index'] - $this->_sections['vars']['step'];
$this->_sections['vars']['index_next'] = $this->_sections['vars']['index'] + $this->_sections['vars']['step'];
$this->_sections['vars']['first']      = ($this->_sections['vars']['iteration'] == 1);
$this->_sections['vars']['last']       = ($this->_sections['vars']['iteration'] == $this->_sections['vars']['total']);
 if (! $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['static']): ?>
<a name="var<?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_name']; ?>
" id="<?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_name']; ?>
"><!-- --></A>
<div class="<?php echo smarty_function_cycle(array('values' => "evenrow,oddrow"), $this);?>
">

	<div class="var-header">
		<img src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['access'] == 'private'): ?>PrivateVariable<?php else: ?>Variable<?php endif; ?>.png" />
		<span class="var-title">
			<span class="var-type"><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_type']; ?>
</span>
			<span class="var-name"><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_name']; ?>
</span>
			<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_default']): ?> = <span class="var-default"><?php echo ((is_array($_tmp=$this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_default'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br />") : smarty_modifier_replace($_tmp, "\n", "<br />")); ?>
</span><?php endif; ?>
			(line <span class="line-number"><?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['slink']):  echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['slink'];  else:  echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['line_number'];  endif; ?></span>)
		</span>
	</div>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "docblock.tpl", 'smarty_include_vars' => array('sdesc' => $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['sdesc'],'desc' => $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['desc'],'tags' => $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['tags'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
	
	<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']): ?>
		<hr class="separator" />
		<div class="notes">Redefinition of:</div>
		<dl>
			<dt><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']['link']; ?>
</dt>
			<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']['sdesc']): ?>
			<dd><?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['var_overrides']['sdesc']; ?>
</dd>
			<?php endif; ?>
		</dl>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar']): ?>
		<hr class="separator" />
		<div class="notes">Redefined in descendants as:</div>
		<ul class="redefinitions">
		<?php if (isset($this->_sections['vm'])) unset($this->_sections['vm']);
$this->_sections['vm']['name'] = 'vm';
$this->_sections['vm']['loop'] = is_array($_loop=$this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vm']['show'] = true;
$this->_sections['vm']['max'] = $this->_sections['vm']['loop'];
$this->_sections['vm']['step'] = 1;
$this->_sections['vm']['start'] = $this->_sections['vm']['step'] > 0 ? 0 : $this->_sections['vm']['loop']-1;
if ($this->_sections['vm']['show']) {
    $this->_sections['vm']['total'] = $this->_sections['vm']['loop'];
    if ($this->_sections['vm']['total'] == 0)
        $this->_sections['vm']['show'] = false;
} else
    $this->_sections['vm']['total'] = 0;
if ($this->_sections['vm']['show']):

            for ($this->_sections['vm']['index'] = $this->_sections['vm']['start'], $this->_sections['vm']['iteration'] = 1;
                 $this->_sections['vm']['iteration'] <= $this->_sections['vm']['total'];
                 $this->_sections['vm']['index'] += $this->_sections['vm']['step'], $this->_sections['vm']['iteration']++):
$this->_sections['vm']['rownum'] = $this->_sections['vm']['iteration'];
$this->_sections['vm']['index_prev'] = $this->_sections['vm']['index'] - $this->_sections['vm']['step'];
$this->_sections['vm']['index_next'] = $this->_sections['vm']['index'] + $this->_sections['vm']['step'];
$this->_sections['vm']['first']      = ($this->_sections['vm']['iteration'] == 1);
$this->_sections['vm']['last']       = ($this->_sections['vm']['iteration'] == $this->_sections['vm']['total']);
?>
			<li>
				<?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar'][$this->_sections['vm']['index']]['link']; ?>

				<?php if ($this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar'][$this->_sections['vm']['index']]['sdesc']): ?>
				: <?php echo $this->_tpl_vars['vars'][$this->_sections['vars']['index']]['descvar'][$this->_sections['vm']['index']]['sdesc']; ?>

				<?php endif; ?>
			</li>
		<?php endfor; endif; ?>
		</ul>
	<?php endif; ?>	

</div>
<?php endif;  endfor; endif; ?>
