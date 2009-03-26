<?php /* Smarty version 2.6.0, created on 2009-03-26 16:00:16
         compiled from method.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'method.tpl', 5, false),)), $this); ?>
<A NAME='method_detail'></A>
<?php if (isset($this->_sections['methods'])) unset($this->_sections['methods']);
$this->_sections['methods']['name'] = 'methods';
$this->_sections['methods']['loop'] = is_array($_loop=$this->_tpl_vars['methods']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['methods']['show'] = true;
$this->_sections['methods']['max'] = $this->_sections['methods']['loop'];
$this->_sections['methods']['step'] = 1;
$this->_sections['methods']['start'] = $this->_sections['methods']['step'] > 0 ? 0 : $this->_sections['methods']['loop']-1;
if ($this->_sections['methods']['show']) {
    $this->_sections['methods']['total'] = $this->_sections['methods']['loop'];
    if ($this->_sections['methods']['total'] == 0)
        $this->_sections['methods']['show'] = false;
} else
    $this->_sections['methods']['total'] = 0;
if ($this->_sections['methods']['show']):

            for ($this->_sections['methods']['index'] = $this->_sections['methods']['start'], $this->_sections['methods']['iteration'] = 1;
                 $this->_sections['methods']['iteration'] <= $this->_sections['methods']['total'];
                 $this->_sections['methods']['index'] += $this->_sections['methods']['step'], $this->_sections['methods']['iteration']++):
$this->_sections['methods']['rownum'] = $this->_sections['methods']['iteration'];
$this->_sections['methods']['index_prev'] = $this->_sections['methods']['index'] - $this->_sections['methods']['step'];
$this->_sections['methods']['index_next'] = $this->_sections['methods']['index'] + $this->_sections['methods']['step'];
$this->_sections['methods']['first']      = ($this->_sections['methods']['iteration'] == 1);
$this->_sections['methods']['last']       = ($this->_sections['methods']['iteration'] == $this->_sections['methods']['total']);
 if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['static']): ?>
<a name="method<?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>
" id="<?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>
"><!-- --></a>
<div class="<?php echo smarty_function_cycle(array('values' => "evenrow,oddrow"), $this);?>
">
	
	<div class="method-header">
		<img src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/StaticMethod.png" />
		<span class="method-title">static <?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>
</span> (line <span class="line-number"><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['slink']):  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['slink'];  else:  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['line_number'];  endif; ?></span>)
	</div> 
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "docblock.tpl", 'smarty_include_vars' => array('sdesc' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['sdesc'],'desc' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['desc'],'tags' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['tags'],'params' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'],'function' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<div class="method-signature">
		<span class="method-result"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_return']; ?>
</span>
		<span class="method-name">
			<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['returnsref']): ?>&amp;<?php endif;  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>

		</span>
		<?php if (count ( $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'] )): ?>
			(<?php if (isset($this->_sections['params'])) unset($this->_sections['params']);
$this->_sections['params']['name'] = 'params';
$this->_sections['params']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['params']['show'] = true;
$this->_sections['params']['max'] = $this->_sections['params']['loop'];
$this->_sections['params']['step'] = 1;
$this->_sections['params']['start'] = $this->_sections['params']['step'] > 0 ? 0 : $this->_sections['params']['loop']-1;
if ($this->_sections['params']['show']) {
    $this->_sections['params']['total'] = $this->_sections['params']['loop'];
    if ($this->_sections['params']['total'] == 0)
        $this->_sections['params']['show'] = false;
} else
    $this->_sections['params']['total'] = 0;
if ($this->_sections['params']['show']):

            for ($this->_sections['params']['index'] = $this->_sections['params']['start'], $this->_sections['params']['iteration'] = 1;
                 $this->_sections['params']['iteration'] <= $this->_sections['params']['total'];
                 $this->_sections['params']['index'] += $this->_sections['params']['step'], $this->_sections['params']['iteration']++):
$this->_sections['params']['rownum'] = $this->_sections['params']['iteration'];
$this->_sections['params']['index_prev'] = $this->_sections['params']['index'] - $this->_sections['params']['step'];
$this->_sections['params']['index_next'] = $this->_sections['params']['index'] + $this->_sections['params']['step'];
$this->_sections['params']['first']      = ($this->_sections['params']['iteration'] == 1);
$this->_sections['params']['last']       = ($this->_sections['params']['iteration'] == $this->_sections['params']['total']);
 if ($this->_sections['params']['iteration'] != 1): ?>, <?php endif;  if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['hasdefault']): ?>[<?php endif; ?><span class="var-type"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['type']; ?>
</span>&nbsp;<span class="var-name"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['name']; ?>
</span><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['hasdefault']): ?> = <span class="var-default"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['default']; ?>
</span>]<?php endif;  endfor; endif; ?>)
		<?php else: ?>
		()
		<?php endif; ?>
	</div>
	
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params']): ?>
		<ul class="parameters">
		<?php if (isset($this->_sections['params'])) unset($this->_sections['params']);
$this->_sections['params']['name'] = 'params';
$this->_sections['params']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['params']['show'] = true;
$this->_sections['params']['max'] = $this->_sections['params']['loop'];
$this->_sections['params']['step'] = 1;
$this->_sections['params']['start'] = $this->_sections['params']['step'] > 0 ? 0 : $this->_sections['params']['loop']-1;
if ($this->_sections['params']['show']) {
    $this->_sections['params']['total'] = $this->_sections['params']['loop'];
    if ($this->_sections['params']['total'] == 0)
        $this->_sections['params']['show'] = false;
} else
    $this->_sections['params']['total'] = 0;
if ($this->_sections['params']['show']):

            for ($this->_sections['params']['index'] = $this->_sections['params']['start'], $this->_sections['params']['iteration'] = 1;
                 $this->_sections['params']['iteration'] <= $this->_sections['params']['total'];
                 $this->_sections['params']['index'] += $this->_sections['params']['step'], $this->_sections['params']['iteration']++):
$this->_sections['params']['rownum'] = $this->_sections['params']['iteration'];
$this->_sections['params']['index_prev'] = $this->_sections['params']['index'] - $this->_sections['params']['step'];
$this->_sections['params']['index_next'] = $this->_sections['params']['index'] + $this->_sections['params']['step'];
$this->_sections['params']['first']      = ($this->_sections['params']['iteration'] == 1);
$this->_sections['params']['last']       = ($this->_sections['params']['iteration'] == $this->_sections['params']['total']);
?>
			<li>
				<span class="var-type"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['datatype']; ?>
</span>
				<span class="var-name"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['var']; ?>
</span><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['data']): ?><span class="var-description">: <?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['data']; ?>
</span><?php endif; ?>
			</li>
		<?php endfor; endif; ?>
		</ul>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']): ?>
		<hr class="separator" />
		<div class="notes">Redefinition of:</div>
		<dl>
			<dt><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']['link']; ?>
</dt>
			<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']['sdesc']): ?>
			<dd><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']['sdesc']; ?>
</dd>
			<?php endif; ?>
		</dl>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements']): ?>
		<hr class="separator" />
		<div class="notes">Implementation of:</div>
	<?php if (isset($this->_sections['imp'])) unset($this->_sections['imp']);
$this->_sections['imp']['name'] = 'imp';
$this->_sections['imp']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['imp']['show'] = true;
$this->_sections['imp']['max'] = $this->_sections['imp']['loop'];
$this->_sections['imp']['step'] = 1;
$this->_sections['imp']['start'] = $this->_sections['imp']['step'] > 0 ? 0 : $this->_sections['imp']['loop']-1;
if ($this->_sections['imp']['show']) {
    $this->_sections['imp']['total'] = $this->_sections['imp']['loop'];
    if ($this->_sections['imp']['total'] == 0)
        $this->_sections['imp']['show'] = false;
} else
    $this->_sections['imp']['total'] = 0;
if ($this->_sections['imp']['show']):

            for ($this->_sections['imp']['index'] = $this->_sections['imp']['start'], $this->_sections['imp']['iteration'] = 1;
                 $this->_sections['imp']['iteration'] <= $this->_sections['imp']['total'];
                 $this->_sections['imp']['index'] += $this->_sections['imp']['step'], $this->_sections['imp']['iteration']++):
$this->_sections['imp']['rownum'] = $this->_sections['imp']['iteration'];
$this->_sections['imp']['index_prev'] = $this->_sections['imp']['index'] - $this->_sections['imp']['step'];
$this->_sections['imp']['index_next'] = $this->_sections['imp']['index'] + $this->_sections['imp']['step'];
$this->_sections['imp']['first']      = ($this->_sections['imp']['iteration'] == 1);
$this->_sections['imp']['last']       = ($this->_sections['imp']['iteration'] == $this->_sections['imp']['total']);
?>
		<dl>
			<dt><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements'][$this->_sections['imp']['index']]['link']; ?>
</dt>
			<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements'][$this->_sections['imp']['index']]['sdesc']): ?>
			<dd><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements'][$this->_sections['imp']['index']]['sdesc']; ?>
</dd>
			<?php endif; ?>
		</dl>
	<?php endfor; endif; ?>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod']): ?>
		<hr class="separator" />
		<div class="notes">Redefined in descendants as:</div>
		<ul class="redefinitions">
		<?php if (isset($this->_sections['dm'])) unset($this->_sections['dm']);
$this->_sections['dm']['name'] = 'dm';
$this->_sections['dm']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dm']['show'] = true;
$this->_sections['dm']['max'] = $this->_sections['dm']['loop'];
$this->_sections['dm']['step'] = 1;
$this->_sections['dm']['start'] = $this->_sections['dm']['step'] > 0 ? 0 : $this->_sections['dm']['loop']-1;
if ($this->_sections['dm']['show']) {
    $this->_sections['dm']['total'] = $this->_sections['dm']['loop'];
    if ($this->_sections['dm']['total'] == 0)
        $this->_sections['dm']['show'] = false;
} else
    $this->_sections['dm']['total'] = 0;
if ($this->_sections['dm']['show']):

            for ($this->_sections['dm']['index'] = $this->_sections['dm']['start'], $this->_sections['dm']['iteration'] = 1;
                 $this->_sections['dm']['iteration'] <= $this->_sections['dm']['total'];
                 $this->_sections['dm']['index'] += $this->_sections['dm']['step'], $this->_sections['dm']['iteration']++):
$this->_sections['dm']['rownum'] = $this->_sections['dm']['iteration'];
$this->_sections['dm']['index_prev'] = $this->_sections['dm']['index'] - $this->_sections['dm']['step'];
$this->_sections['dm']['index_next'] = $this->_sections['dm']['index'] + $this->_sections['dm']['step'];
$this->_sections['dm']['first']      = ($this->_sections['dm']['iteration'] == 1);
$this->_sections['dm']['last']       = ($this->_sections['dm']['iteration'] == $this->_sections['dm']['total']);
?>
			<li>
				<?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod'][$this->_sections['dm']['index']]['link']; ?>

				<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod'][$this->_sections['dm']['index']]['sdesc']): ?>
				: <?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod'][$this->_sections['dm']['index']]['sdesc']; ?>

				<?php endif; ?>
			</li>
		<?php endfor; endif; ?>
		</ul>
	<?php endif; ?>
</div>
<?php endif;  endfor; endif;  if (isset($this->_sections['methods'])) unset($this->_sections['methods']);
$this->_sections['methods']['name'] = 'methods';
$this->_sections['methods']['loop'] = is_array($_loop=$this->_tpl_vars['methods']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['methods']['show'] = true;
$this->_sections['methods']['max'] = $this->_sections['methods']['loop'];
$this->_sections['methods']['step'] = 1;
$this->_sections['methods']['start'] = $this->_sections['methods']['step'] > 0 ? 0 : $this->_sections['methods']['loop']-1;
if ($this->_sections['methods']['show']) {
    $this->_sections['methods']['total'] = $this->_sections['methods']['loop'];
    if ($this->_sections['methods']['total'] == 0)
        $this->_sections['methods']['show'] = false;
} else
    $this->_sections['methods']['total'] = 0;
if ($this->_sections['methods']['show']):

            for ($this->_sections['methods']['index'] = $this->_sections['methods']['start'], $this->_sections['methods']['iteration'] = 1;
                 $this->_sections['methods']['iteration'] <= $this->_sections['methods']['total'];
                 $this->_sections['methods']['index'] += $this->_sections['methods']['step'], $this->_sections['methods']['iteration']++):
$this->_sections['methods']['rownum'] = $this->_sections['methods']['iteration'];
$this->_sections['methods']['index_prev'] = $this->_sections['methods']['index'] - $this->_sections['methods']['step'];
$this->_sections['methods']['index_next'] = $this->_sections['methods']['index'] + $this->_sections['methods']['step'];
$this->_sections['methods']['first']      = ($this->_sections['methods']['iteration'] == 1);
$this->_sections['methods']['last']       = ($this->_sections['methods']['iteration'] == $this->_sections['methods']['total']);
 if (! $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['static']): ?>
<a name="method<?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>
" id="<?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>
"><!-- --></a>
<div class="<?php echo smarty_function_cycle(array('values' => "evenrow,oddrow"), $this);?>
">
	
	<div class="method-header">
		<img src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['constructor']): ?>Constructor<?php elseif ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['destructor']): ?>Destructor<?php else:  if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['abstract']): ?>Abstract<?php endif;  if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['access'] == 'private'): ?>Private<?php endif; ?>Method<?php endif; ?>.png" />
		<span class="method-title"><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['constructor']): ?>Constructor <?php elseif ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['destructor']): ?>Destructor <?php endif;  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>
</span> (line <span class="line-number"><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['slink']):  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['slink'];  else:  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['line_number'];  endif; ?></span>)
	</div> 
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "docblock.tpl", 'smarty_include_vars' => array('sdesc' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['sdesc'],'desc' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['desc'],'tags' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['tags'],'params' => $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'],'function' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<div class="method-signature">
		<span class="method-result"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_return']; ?>
</span>
		<span class="method-name">
			<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['returnsref']): ?>&amp;<?php endif;  echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['function_name']; ?>

		</span>
		<?php if (count ( $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'] )): ?>
			(<?php if (isset($this->_sections['params'])) unset($this->_sections['params']);
$this->_sections['params']['name'] = 'params';
$this->_sections['params']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['params']['show'] = true;
$this->_sections['params']['max'] = $this->_sections['params']['loop'];
$this->_sections['params']['step'] = 1;
$this->_sections['params']['start'] = $this->_sections['params']['step'] > 0 ? 0 : $this->_sections['params']['loop']-1;
if ($this->_sections['params']['show']) {
    $this->_sections['params']['total'] = $this->_sections['params']['loop'];
    if ($this->_sections['params']['total'] == 0)
        $this->_sections['params']['show'] = false;
} else
    $this->_sections['params']['total'] = 0;
if ($this->_sections['params']['show']):

            for ($this->_sections['params']['index'] = $this->_sections['params']['start'], $this->_sections['params']['iteration'] = 1;
                 $this->_sections['params']['iteration'] <= $this->_sections['params']['total'];
                 $this->_sections['params']['index'] += $this->_sections['params']['step'], $this->_sections['params']['iteration']++):
$this->_sections['params']['rownum'] = $this->_sections['params']['iteration'];
$this->_sections['params']['index_prev'] = $this->_sections['params']['index'] - $this->_sections['params']['step'];
$this->_sections['params']['index_next'] = $this->_sections['params']['index'] + $this->_sections['params']['step'];
$this->_sections['params']['first']      = ($this->_sections['params']['iteration'] == 1);
$this->_sections['params']['last']       = ($this->_sections['params']['iteration'] == $this->_sections['params']['total']);
 if ($this->_sections['params']['iteration'] != 1): ?>, <?php endif;  if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['hasdefault']): ?>[<?php endif; ?><span class="var-type"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['type']; ?>
</span>&nbsp;<span class="var-name"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['name']; ?>
</span><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['hasdefault']): ?> = <span class="var-default"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['ifunction_call']['params'][$this->_sections['params']['index']]['default']; ?>
</span>]<?php endif;  endfor; endif; ?>)
		<?php else: ?>
		()
		<?php endif; ?>
	</div>
	
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params']): ?>
		<ul class="parameters">
		<?php if (isset($this->_sections['params'])) unset($this->_sections['params']);
$this->_sections['params']['name'] = 'params';
$this->_sections['params']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['params']['show'] = true;
$this->_sections['params']['max'] = $this->_sections['params']['loop'];
$this->_sections['params']['step'] = 1;
$this->_sections['params']['start'] = $this->_sections['params']['step'] > 0 ? 0 : $this->_sections['params']['loop']-1;
if ($this->_sections['params']['show']) {
    $this->_sections['params']['total'] = $this->_sections['params']['loop'];
    if ($this->_sections['params']['total'] == 0)
        $this->_sections['params']['show'] = false;
} else
    $this->_sections['params']['total'] = 0;
if ($this->_sections['params']['show']):

            for ($this->_sections['params']['index'] = $this->_sections['params']['start'], $this->_sections['params']['iteration'] = 1;
                 $this->_sections['params']['iteration'] <= $this->_sections['params']['total'];
                 $this->_sections['params']['index'] += $this->_sections['params']['step'], $this->_sections['params']['iteration']++):
$this->_sections['params']['rownum'] = $this->_sections['params']['iteration'];
$this->_sections['params']['index_prev'] = $this->_sections['params']['index'] - $this->_sections['params']['step'];
$this->_sections['params']['index_next'] = $this->_sections['params']['index'] + $this->_sections['params']['step'];
$this->_sections['params']['first']      = ($this->_sections['params']['iteration'] == 1);
$this->_sections['params']['last']       = ($this->_sections['params']['iteration'] == $this->_sections['params']['total']);
?>
			<li>
				<span class="var-type"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['datatype']; ?>
</span>
				<span class="var-name"><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['var']; ?>
</span><?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['data']): ?><span class="var-description">: <?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['params'][$this->_sections['params']['index']]['data']; ?>
</span><?php endif; ?>
			</li>
		<?php endfor; endif; ?>
		</ul>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']): ?>
		<hr class="separator" />
		<div class="notes">Redefinition of:</div>
		<dl>
			<dt><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']['link']; ?>
</dt>
			<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']['sdesc']): ?>
			<dd><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_overrides']['sdesc']; ?>
</dd>
			<?php endif; ?>
		</dl>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements']): ?>
		<hr class="separator" />
		<div class="notes">Implementation of:</div>
	<?php if (isset($this->_sections['imp'])) unset($this->_sections['imp']);
$this->_sections['imp']['name'] = 'imp';
$this->_sections['imp']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['imp']['show'] = true;
$this->_sections['imp']['max'] = $this->_sections['imp']['loop'];
$this->_sections['imp']['step'] = 1;
$this->_sections['imp']['start'] = $this->_sections['imp']['step'] > 0 ? 0 : $this->_sections['imp']['loop']-1;
if ($this->_sections['imp']['show']) {
    $this->_sections['imp']['total'] = $this->_sections['imp']['loop'];
    if ($this->_sections['imp']['total'] == 0)
        $this->_sections['imp']['show'] = false;
} else
    $this->_sections['imp']['total'] = 0;
if ($this->_sections['imp']['show']):

            for ($this->_sections['imp']['index'] = $this->_sections['imp']['start'], $this->_sections['imp']['iteration'] = 1;
                 $this->_sections['imp']['iteration'] <= $this->_sections['imp']['total'];
                 $this->_sections['imp']['index'] += $this->_sections['imp']['step'], $this->_sections['imp']['iteration']++):
$this->_sections['imp']['rownum'] = $this->_sections['imp']['iteration'];
$this->_sections['imp']['index_prev'] = $this->_sections['imp']['index'] - $this->_sections['imp']['step'];
$this->_sections['imp']['index_next'] = $this->_sections['imp']['index'] + $this->_sections['imp']['step'];
$this->_sections['imp']['first']      = ($this->_sections['imp']['iteration'] == 1);
$this->_sections['imp']['last']       = ($this->_sections['imp']['iteration'] == $this->_sections['imp']['total']);
?>
		<dl>
			<dt><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements'][$this->_sections['imp']['index']]['link']; ?>
</dt>
			<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements'][$this->_sections['imp']['index']]['sdesc']): ?>
			<dd><?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['method_implements'][$this->_sections['imp']['index']]['sdesc']; ?>
</dd>
			<?php endif; ?>
		</dl>
	<?php endfor; endif; ?>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod']): ?>
		<hr class="separator" />
		<div class="notes">Redefined in descendants as:</div>
		<ul class="redefinitions">
		<?php if (isset($this->_sections['dm'])) unset($this->_sections['dm']);
$this->_sections['dm']['name'] = 'dm';
$this->_sections['dm']['loop'] = is_array($_loop=$this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dm']['show'] = true;
$this->_sections['dm']['max'] = $this->_sections['dm']['loop'];
$this->_sections['dm']['step'] = 1;
$this->_sections['dm']['start'] = $this->_sections['dm']['step'] > 0 ? 0 : $this->_sections['dm']['loop']-1;
if ($this->_sections['dm']['show']) {
    $this->_sections['dm']['total'] = $this->_sections['dm']['loop'];
    if ($this->_sections['dm']['total'] == 0)
        $this->_sections['dm']['show'] = false;
} else
    $this->_sections['dm']['total'] = 0;
if ($this->_sections['dm']['show']):

            for ($this->_sections['dm']['index'] = $this->_sections['dm']['start'], $this->_sections['dm']['iteration'] = 1;
                 $this->_sections['dm']['iteration'] <= $this->_sections['dm']['total'];
                 $this->_sections['dm']['index'] += $this->_sections['dm']['step'], $this->_sections['dm']['iteration']++):
$this->_sections['dm']['rownum'] = $this->_sections['dm']['iteration'];
$this->_sections['dm']['index_prev'] = $this->_sections['dm']['index'] - $this->_sections['dm']['step'];
$this->_sections['dm']['index_next'] = $this->_sections['dm']['index'] + $this->_sections['dm']['step'];
$this->_sections['dm']['first']      = ($this->_sections['dm']['iteration'] == 1);
$this->_sections['dm']['last']       = ($this->_sections['dm']['iteration'] == $this->_sections['dm']['total']);
?>
			<li>
				<?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod'][$this->_sections['dm']['index']]['link']; ?>

				<?php if ($this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod'][$this->_sections['dm']['index']]['sdesc']): ?>
				: <?php echo $this->_tpl_vars['methods'][$this->_sections['methods']['index']]['descmethod'][$this->_sections['dm']['index']]['sdesc']; ?>

				<?php endif; ?>
			</li>
		<?php endfor; endif; ?>
		</ul>
	<?php endif; ?>
</div>
<?php endif;  endfor; endif; ?>