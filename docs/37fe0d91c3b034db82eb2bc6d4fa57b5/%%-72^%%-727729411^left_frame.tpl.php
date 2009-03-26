<?php /* Smarty version 2.6.0, created on 2009-03-26 16:00:15
         compiled from left_frame.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('top2' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="package-title"><?php echo $this->_tpl_vars['package']; ?>
</div>
<div class="package-details">
			
	<dl class="tree">
		
		<dt class="folder-title">Description</dt>
		<dd>
			<a href='<?php echo $this->_tpl_vars['classtreepage']; ?>
.html' target='right'>Class trees</a><br />
			<a href='<?php echo $this->_tpl_vars['elementindex']; ?>
.html' target='right'>Index of elements</a><br />
			<?php if ($this->_tpl_vars['hastodos']): ?>
				<a href="<?php echo $this->_tpl_vars['todolink']; ?>
" target="right">Todo List</a><br />
			<?php endif; ?>
		</dd>
	
		<?php if (isset($this->_sections['p'])) unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
					
			<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['subpackage'] == ""): ?>
				
				<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']): ?>
					<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/tutorial_folder.png" alt=" ">Tutorials/Manuals</dt>
					<dd>
					<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['pkg']): ?>
						<dl class="tree">
						<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/package_folder.png" alt=" ">Package-level</dt>
						<dd>
						<?php if (isset($this->_sections['ext'])) unset($this->_sections['ext']);
$this->_sections['ext']['name'] = 'ext';
$this->_sections['ext']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['pkg']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ext']['show'] = true;
$this->_sections['ext']['max'] = $this->_sections['ext']['loop'];
$this->_sections['ext']['step'] = 1;
$this->_sections['ext']['start'] = $this->_sections['ext']['step'] > 0 ? 0 : $this->_sections['ext']['loop']-1;
if ($this->_sections['ext']['show']) {
    $this->_sections['ext']['total'] = $this->_sections['ext']['loop'];
    if ($this->_sections['ext']['total'] == 0)
        $this->_sections['ext']['show'] = false;
} else
    $this->_sections['ext']['total'] = 0;
if ($this->_sections['ext']['show']):

            for ($this->_sections['ext']['index'] = $this->_sections['ext']['start'], $this->_sections['ext']['iteration'] = 1;
                 $this->_sections['ext']['iteration'] <= $this->_sections['ext']['total'];
                 $this->_sections['ext']['index'] += $this->_sections['ext']['step'], $this->_sections['ext']['iteration']++):
$this->_sections['ext']['rownum'] = $this->_sections['ext']['iteration'];
$this->_sections['ext']['index_prev'] = $this->_sections['ext']['index'] - $this->_sections['ext']['step'];
$this->_sections['ext']['index_next'] = $this->_sections['ext']['index'] + $this->_sections['ext']['step'];
$this->_sections['ext']['first']      = ($this->_sections['ext']['iteration'] == 1);
$this->_sections['ext']['last']       = ($this->_sections['ext']['iteration'] == $this->_sections['ext']['total']);
?>
							<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['pkg'][$this->_sections['ext']['index']]; ?>

						<?php endfor; endif; ?>
						</dd>
						</dl>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['cls']): ?>
						<dl class="tree">
						<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/class_folder.png" alt=" ">Class-level</dt>
						<dd>
						<?php if (isset($this->_sections['ext'])) unset($this->_sections['ext']);
$this->_sections['ext']['name'] = 'ext';
$this->_sections['ext']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['cls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ext']['show'] = true;
$this->_sections['ext']['max'] = $this->_sections['ext']['loop'];
$this->_sections['ext']['step'] = 1;
$this->_sections['ext']['start'] = $this->_sections['ext']['step'] > 0 ? 0 : $this->_sections['ext']['loop']-1;
if ($this->_sections['ext']['show']) {
    $this->_sections['ext']['total'] = $this->_sections['ext']['loop'];
    if ($this->_sections['ext']['total'] == 0)
        $this->_sections['ext']['show'] = false;
} else
    $this->_sections['ext']['total'] = 0;
if ($this->_sections['ext']['show']):

            for ($this->_sections['ext']['index'] = $this->_sections['ext']['start'], $this->_sections['ext']['iteration'] = 1;
                 $this->_sections['ext']['iteration'] <= $this->_sections['ext']['total'];
                 $this->_sections['ext']['index'] += $this->_sections['ext']['step'], $this->_sections['ext']['iteration']++):
$this->_sections['ext']['rownum'] = $this->_sections['ext']['iteration'];
$this->_sections['ext']['index_prev'] = $this->_sections['ext']['index'] - $this->_sections['ext']['step'];
$this->_sections['ext']['index_next'] = $this->_sections['ext']['index'] + $this->_sections['ext']['step'];
$this->_sections['ext']['first']      = ($this->_sections['ext']['iteration'] == 1);
$this->_sections['ext']['last']       = ($this->_sections['ext']['iteration'] == $this->_sections['ext']['total']);
?>
							<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['cls'][$this->_sections['ext']['index']]; ?>

						<?php endfor; endif; ?>
						</dd>
						</dl>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['proc']): ?>
						<dl class="tree">
						<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/function_folder.png" alt=" ">Function-level</dt>
						<dd>
						<?php if (isset($this->_sections['ext'])) unset($this->_sections['ext']);
$this->_sections['ext']['name'] = 'ext';
$this->_sections['ext']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['proc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ext']['show'] = true;
$this->_sections['ext']['max'] = $this->_sections['ext']['loop'];
$this->_sections['ext']['step'] = 1;
$this->_sections['ext']['start'] = $this->_sections['ext']['step'] > 0 ? 0 : $this->_sections['ext']['loop']-1;
if ($this->_sections['ext']['show']) {
    $this->_sections['ext']['total'] = $this->_sections['ext']['loop'];
    if ($this->_sections['ext']['total'] == 0)
        $this->_sections['ext']['show'] = false;
} else
    $this->_sections['ext']['total'] = 0;
if ($this->_sections['ext']['show']):

            for ($this->_sections['ext']['index'] = $this->_sections['ext']['start'], $this->_sections['ext']['iteration'] = 1;
                 $this->_sections['ext']['iteration'] <= $this->_sections['ext']['total'];
                 $this->_sections['ext']['index'] += $this->_sections['ext']['step'], $this->_sections['ext']['iteration']++):
$this->_sections['ext']['rownum'] = $this->_sections['ext']['iteration'];
$this->_sections['ext']['index_prev'] = $this->_sections['ext']['index'] - $this->_sections['ext']['step'];
$this->_sections['ext']['index_next'] = $this->_sections['ext']['index'] + $this->_sections['ext']['step'];
$this->_sections['ext']['first']      = ($this->_sections['ext']['iteration'] == 1);
$this->_sections['ext']['last']       = ($this->_sections['ext']['iteration'] == $this->_sections['ext']['total']);
?>
							<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['proc'][$this->_sections['ext']['index']]; ?>

						<?php endfor; endif; ?>
						</dd>
						</dl>
					<?php endif; ?>
					</dd>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['hasinterfaces']): ?>
					<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/class_folder.png" alt=" ">Interfaces</dt>
					<?php if (isset($this->_sections['class'])) unset($this->_sections['class']);
$this->_sections['class']['name'] = 'class';
$this->_sections['class']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['classes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['class']['show'] = true;
$this->_sections['class']['max'] = $this->_sections['class']['loop'];
$this->_sections['class']['step'] = 1;
$this->_sections['class']['start'] = $this->_sections['class']['step'] > 0 ? 0 : $this->_sections['class']['loop']-1;
if ($this->_sections['class']['show']) {
    $this->_sections['class']['total'] = $this->_sections['class']['loop'];
    if ($this->_sections['class']['total'] == 0)
        $this->_sections['class']['show'] = false;
} else
    $this->_sections['class']['total'] = 0;
if ($this->_sections['class']['show']):

            for ($this->_sections['class']['index'] = $this->_sections['class']['start'], $this->_sections['class']['iteration'] = 1;
                 $this->_sections['class']['iteration'] <= $this->_sections['class']['total'];
                 $this->_sections['class']['index'] += $this->_sections['class']['step'], $this->_sections['class']['iteration']++):
$this->_sections['class']['rownum'] = $this->_sections['class']['iteration'];
$this->_sections['class']['index_prev'] = $this->_sections['class']['index'] - $this->_sections['class']['step'];
$this->_sections['class']['index_next'] = $this->_sections['class']['index'] + $this->_sections['class']['step'];
$this->_sections['class']['first']      = ($this->_sections['class']['iteration'] == 1);
$this->_sections['class']['last']       = ($this->_sections['class']['iteration'] == $this->_sections['class']['total']);
?>
					    <?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['is_interface']): ?>
						    <dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/Interface.png" alt="Interface"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['title']; ?>
</a></dd>
					    <?php endif; ?>
					<?php endfor; endif; ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['hasclasses']): ?>
					<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/class_folder.png" alt=" ">Classes</dt>
					<?php if (isset($this->_sections['class'])) unset($this->_sections['class']);
$this->_sections['class']['name'] = 'class';
$this->_sections['class']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['classes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['class']['show'] = true;
$this->_sections['class']['max'] = $this->_sections['class']['loop'];
$this->_sections['class']['step'] = 1;
$this->_sections['class']['start'] = $this->_sections['class']['step'] > 0 ? 0 : $this->_sections['class']['loop']-1;
if ($this->_sections['class']['show']) {
    $this->_sections['class']['total'] = $this->_sections['class']['loop'];
    if ($this->_sections['class']['total'] == 0)
        $this->_sections['class']['show'] = false;
} else
    $this->_sections['class']['total'] = 0;
if ($this->_sections['class']['show']):

            for ($this->_sections['class']['index'] = $this->_sections['class']['start'], $this->_sections['class']['iteration'] = 1;
                 $this->_sections['class']['iteration'] <= $this->_sections['class']['total'];
                 $this->_sections['class']['index'] += $this->_sections['class']['step'], $this->_sections['class']['iteration']++):
$this->_sections['class']['rownum'] = $this->_sections['class']['iteration'];
$this->_sections['class']['index_prev'] = $this->_sections['class']['index'] - $this->_sections['class']['step'];
$this->_sections['class']['index_next'] = $this->_sections['class']['index'] + $this->_sections['class']['step'];
$this->_sections['class']['first']      = ($this->_sections['class']['iteration'] == 1);
$this->_sections['class']['last']       = ($this->_sections['class']['iteration'] == $this->_sections['class']['total']);
?>
					    <?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['is_class']): ?>
						    <dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['abstract']): ?>Abstract<?php endif;  if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['access'] == 'private'): ?>Private<?php endif; ?>Class.png" alt="Class"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['title']; ?>
</a></dd>
					    <?php endif; ?>
					<?php endfor; endif; ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['functions']): ?>
					<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/function_folder.png" alt=" ">Functions</dt>
					<?php if (isset($this->_sections['f'])) unset($this->_sections['f']);
$this->_sections['f']['name'] = 'f';
$this->_sections['f']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['functions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['f']['show'] = true;
$this->_sections['f']['max'] = $this->_sections['f']['loop'];
$this->_sections['f']['step'] = 1;
$this->_sections['f']['start'] = $this->_sections['f']['step'] > 0 ? 0 : $this->_sections['f']['loop']-1;
if ($this->_sections['f']['show']) {
    $this->_sections['f']['total'] = $this->_sections['f']['loop'];
    if ($this->_sections['f']['total'] == 0)
        $this->_sections['f']['show'] = false;
} else
    $this->_sections['f']['total'] = 0;
if ($this->_sections['f']['show']):

            for ($this->_sections['f']['index'] = $this->_sections['f']['start'], $this->_sections['f']['iteration'] = 1;
                 $this->_sections['f']['iteration'] <= $this->_sections['f']['total'];
                 $this->_sections['f']['index'] += $this->_sections['f']['step'], $this->_sections['f']['iteration']++):
$this->_sections['f']['rownum'] = $this->_sections['f']['iteration'];
$this->_sections['f']['index_prev'] = $this->_sections['f']['index'] - $this->_sections['f']['step'];
$this->_sections['f']['index_next'] = $this->_sections['f']['index'] + $this->_sections['f']['step'];
$this->_sections['f']['first']      = ($this->_sections['f']['iteration'] == 1);
$this->_sections['f']['last']       = ($this->_sections['f']['iteration'] == $this->_sections['f']['total']);
?>
						<dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/Function.png" alt="Function"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['functions'][$this->_sections['f']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['functions'][$this->_sections['f']['index']]['title']; ?>
</a></dd>
					<?php endfor; endif; ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['files']): ?>
					<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/folder.png" alt=" ">Files</dt>
					<?php if (isset($this->_sections['nonclass'])) unset($this->_sections['nonclass']);
$this->_sections['nonclass']['name'] = 'nonclass';
$this->_sections['nonclass']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nonclass']['show'] = true;
$this->_sections['nonclass']['max'] = $this->_sections['nonclass']['loop'];
$this->_sections['nonclass']['step'] = 1;
$this->_sections['nonclass']['start'] = $this->_sections['nonclass']['step'] > 0 ? 0 : $this->_sections['nonclass']['loop']-1;
if ($this->_sections['nonclass']['show']) {
    $this->_sections['nonclass']['total'] = $this->_sections['nonclass']['loop'];
    if ($this->_sections['nonclass']['total'] == 0)
        $this->_sections['nonclass']['show'] = false;
} else
    $this->_sections['nonclass']['total'] = 0;
if ($this->_sections['nonclass']['show']):

            for ($this->_sections['nonclass']['index'] = $this->_sections['nonclass']['start'], $this->_sections['nonclass']['iteration'] = 1;
                 $this->_sections['nonclass']['iteration'] <= $this->_sections['nonclass']['total'];
                 $this->_sections['nonclass']['index'] += $this->_sections['nonclass']['step'], $this->_sections['nonclass']['iteration']++):
$this->_sections['nonclass']['rownum'] = $this->_sections['nonclass']['iteration'];
$this->_sections['nonclass']['index_prev'] = $this->_sections['nonclass']['index'] - $this->_sections['nonclass']['step'];
$this->_sections['nonclass']['index_next'] = $this->_sections['nonclass']['index'] + $this->_sections['nonclass']['step'];
$this->_sections['nonclass']['first']      = ($this->_sections['nonclass']['iteration'] == 1);
$this->_sections['nonclass']['last']       = ($this->_sections['nonclass']['iteration'] == $this->_sections['nonclass']['total']);
?>
						<dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/Page.png" alt="File"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['files'][$this->_sections['nonclass']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['files'][$this->_sections['nonclass']['index']]['title']; ?>
</a></dd>
					<?php endfor; endif; ?>
				<?php endif; ?>
								
			<?php else: ?>
				<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']): ?>			
					<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/tutorial_folder.png" alt=" ">Tutorials/Manuals</dt>
					<dd>
					<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['pkg']): ?>
						<dl class="tree">
						<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/package_folder.png" alt=" ">Package-level</dt>
						<dd>
						<?php if (isset($this->_sections['ext'])) unset($this->_sections['ext']);
$this->_sections['ext']['name'] = 'ext';
$this->_sections['ext']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['pkg']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ext']['show'] = true;
$this->_sections['ext']['max'] = $this->_sections['ext']['loop'];
$this->_sections['ext']['step'] = 1;
$this->_sections['ext']['start'] = $this->_sections['ext']['step'] > 0 ? 0 : $this->_sections['ext']['loop']-1;
if ($this->_sections['ext']['show']) {
    $this->_sections['ext']['total'] = $this->_sections['ext']['loop'];
    if ($this->_sections['ext']['total'] == 0)
        $this->_sections['ext']['show'] = false;
} else
    $this->_sections['ext']['total'] = 0;
if ($this->_sections['ext']['show']):

            for ($this->_sections['ext']['index'] = $this->_sections['ext']['start'], $this->_sections['ext']['iteration'] = 1;
                 $this->_sections['ext']['iteration'] <= $this->_sections['ext']['total'];
                 $this->_sections['ext']['index'] += $this->_sections['ext']['step'], $this->_sections['ext']['iteration']++):
$this->_sections['ext']['rownum'] = $this->_sections['ext']['iteration'];
$this->_sections['ext']['index_prev'] = $this->_sections['ext']['index'] - $this->_sections['ext']['step'];
$this->_sections['ext']['index_next'] = $this->_sections['ext']['index'] + $this->_sections['ext']['step'];
$this->_sections['ext']['first']      = ($this->_sections['ext']['iteration'] == 1);
$this->_sections['ext']['last']       = ($this->_sections['ext']['iteration'] == $this->_sections['ext']['total']);
?>
							<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['pkg'][$this->_sections['ext']['index']]; ?>

						<?php endfor; endif; ?>
						</dd>
						</dl>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['cls']): ?>
						<dl class="tree">
						<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/class_folder.png" alt=" ">Class-level</dt>
						<dd>
						<?php if (isset($this->_sections['ext'])) unset($this->_sections['ext']);
$this->_sections['ext']['name'] = 'ext';
$this->_sections['ext']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['cls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ext']['show'] = true;
$this->_sections['ext']['max'] = $this->_sections['ext']['loop'];
$this->_sections['ext']['step'] = 1;
$this->_sections['ext']['start'] = $this->_sections['ext']['step'] > 0 ? 0 : $this->_sections['ext']['loop']-1;
if ($this->_sections['ext']['show']) {
    $this->_sections['ext']['total'] = $this->_sections['ext']['loop'];
    if ($this->_sections['ext']['total'] == 0)
        $this->_sections['ext']['show'] = false;
} else
    $this->_sections['ext']['total'] = 0;
if ($this->_sections['ext']['show']):

            for ($this->_sections['ext']['index'] = $this->_sections['ext']['start'], $this->_sections['ext']['iteration'] = 1;
                 $this->_sections['ext']['iteration'] <= $this->_sections['ext']['total'];
                 $this->_sections['ext']['index'] += $this->_sections['ext']['step'], $this->_sections['ext']['iteration']++):
$this->_sections['ext']['rownum'] = $this->_sections['ext']['iteration'];
$this->_sections['ext']['index_prev'] = $this->_sections['ext']['index'] - $this->_sections['ext']['step'];
$this->_sections['ext']['index_next'] = $this->_sections['ext']['index'] + $this->_sections['ext']['step'];
$this->_sections['ext']['first']      = ($this->_sections['ext']['iteration'] == 1);
$this->_sections['ext']['last']       = ($this->_sections['ext']['iteration'] == $this->_sections['ext']['total']);
?>
							<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['cls'][$this->_sections['ext']['index']]; ?>

						<?php endfor; endif; ?>
						</dd>
						</dl>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['proc']): ?>
						<dl class="tree">
						<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/function_folder.png" alt=" ">Function-level</dt>
						<dd>
						<?php if (isset($this->_sections['ext'])) unset($this->_sections['ext']);
$this->_sections['ext']['name'] = 'ext';
$this->_sections['ext']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['proc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ext']['show'] = true;
$this->_sections['ext']['max'] = $this->_sections['ext']['loop'];
$this->_sections['ext']['step'] = 1;
$this->_sections['ext']['start'] = $this->_sections['ext']['step'] > 0 ? 0 : $this->_sections['ext']['loop']-1;
if ($this->_sections['ext']['show']) {
    $this->_sections['ext']['total'] = $this->_sections['ext']['loop'];
    if ($this->_sections['ext']['total'] == 0)
        $this->_sections['ext']['show'] = false;
} else
    $this->_sections['ext']['total'] = 0;
if ($this->_sections['ext']['show']):

            for ($this->_sections['ext']['index'] = $this->_sections['ext']['start'], $this->_sections['ext']['iteration'] = 1;
                 $this->_sections['ext']['iteration'] <= $this->_sections['ext']['total'];
                 $this->_sections['ext']['index'] += $this->_sections['ext']['step'], $this->_sections['ext']['iteration']++):
$this->_sections['ext']['rownum'] = $this->_sections['ext']['iteration'];
$this->_sections['ext']['index_prev'] = $this->_sections['ext']['index'] - $this->_sections['ext']['step'];
$this->_sections['ext']['index_next'] = $this->_sections['ext']['index'] + $this->_sections['ext']['step'];
$this->_sections['ext']['first']      = ($this->_sections['ext']['iteration'] == 1);
$this->_sections['ext']['last']       = ($this->_sections['ext']['iteration'] == $this->_sections['ext']['total']);
?>
							<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['tutorials']['proc'][$this->_sections['ext']['index']]; ?>

						<?php endfor; endif; ?>
						</dd>
						</dl>
					<?php endif; ?>
					</dd>
				<?php endif; ?>
				
				<dt class="sub-package"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/package.png" alt="Sub-package"><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['subpackage']; ?>
</dt>
				<dd>
					<dl class="tree">
						<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['subpackagetutorial']): ?>
							<div><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/tutorial.png" alt="Tutorial"><a href="<?php echo $this->_tpl_vars['info']['0']['subpackagetutorialnoa']; ?>
" target="right"><?php echo $this->_tpl_vars['info']['0']['subpackagetutorialtitle']; ?>
</a></div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes']): ?>
							<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/class_folder.png" alt=" ">Classes</dt>
							<?php if (isset($this->_sections['class'])) unset($this->_sections['class']);
$this->_sections['class']['name'] = 'class';
$this->_sections['class']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['classes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['class']['show'] = true;
$this->_sections['class']['max'] = $this->_sections['class']['loop'];
$this->_sections['class']['step'] = 1;
$this->_sections['class']['start'] = $this->_sections['class']['step'] > 0 ? 0 : $this->_sections['class']['loop']-1;
if ($this->_sections['class']['show']) {
    $this->_sections['class']['total'] = $this->_sections['class']['loop'];
    if ($this->_sections['class']['total'] == 0)
        $this->_sections['class']['show'] = false;
} else
    $this->_sections['class']['total'] = 0;
if ($this->_sections['class']['show']):

            for ($this->_sections['class']['index'] = $this->_sections['class']['start'], $this->_sections['class']['iteration'] = 1;
                 $this->_sections['class']['iteration'] <= $this->_sections['class']['total'];
                 $this->_sections['class']['index'] += $this->_sections['class']['step'], $this->_sections['class']['iteration']++):
$this->_sections['class']['rownum'] = $this->_sections['class']['iteration'];
$this->_sections['class']['index_prev'] = $this->_sections['class']['index'] - $this->_sections['class']['step'];
$this->_sections['class']['index_next'] = $this->_sections['class']['index'] + $this->_sections['class']['step'];
$this->_sections['class']['first']      = ($this->_sections['class']['iteration'] == 1);
$this->_sections['class']['last']       = ($this->_sections['class']['iteration'] == $this->_sections['class']['total']);
?>
								<dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['abstract']): ?>Abstract<?php endif;  if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['access'] == 'private'): ?>Private<?php endif; ?>Class.png" alt="Class"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['classes'][$this->_sections['class']['index']]['title']; ?>
</a></dd>
							<?php endfor; endif; ?>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['functions']): ?>
							<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/function_folder.png" alt=" ">Functions</dt>
							<?php if (isset($this->_sections['f'])) unset($this->_sections['f']);
$this->_sections['f']['name'] = 'f';
$this->_sections['f']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['functions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['f']['show'] = true;
$this->_sections['f']['max'] = $this->_sections['f']['loop'];
$this->_sections['f']['step'] = 1;
$this->_sections['f']['start'] = $this->_sections['f']['step'] > 0 ? 0 : $this->_sections['f']['loop']-1;
if ($this->_sections['f']['show']) {
    $this->_sections['f']['total'] = $this->_sections['f']['loop'];
    if ($this->_sections['f']['total'] == 0)
        $this->_sections['f']['show'] = false;
} else
    $this->_sections['f']['total'] = 0;
if ($this->_sections['f']['show']):

            for ($this->_sections['f']['index'] = $this->_sections['f']['start'], $this->_sections['f']['iteration'] = 1;
                 $this->_sections['f']['iteration'] <= $this->_sections['f']['total'];
                 $this->_sections['f']['index'] += $this->_sections['f']['step'], $this->_sections['f']['iteration']++):
$this->_sections['f']['rownum'] = $this->_sections['f']['iteration'];
$this->_sections['f']['index_prev'] = $this->_sections['f']['index'] - $this->_sections['f']['step'];
$this->_sections['f']['index_next'] = $this->_sections['f']['index'] + $this->_sections['f']['step'];
$this->_sections['f']['first']      = ($this->_sections['f']['iteration'] == 1);
$this->_sections['f']['last']       = ($this->_sections['f']['iteration'] == $this->_sections['f']['total']);
?>
								<dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/Function.png" alt="Function"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['functions'][$this->_sections['f']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['functions'][$this->_sections['f']['index']]['title']; ?>
</a></dd>
							<?php endfor; endif; ?>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['info'][$this->_sections['p']['index']]['files']): ?>
							<dt class="folder-title"><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/folder.png" alt=" ">Files</dt>
							<?php if (isset($this->_sections['nonclass'])) unset($this->_sections['nonclass']);
$this->_sections['nonclass']['name'] = 'nonclass';
$this->_sections['nonclass']['loop'] = is_array($_loop=$this->_tpl_vars['info'][$this->_sections['p']['index']]['files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nonclass']['show'] = true;
$this->_sections['nonclass']['max'] = $this->_sections['nonclass']['loop'];
$this->_sections['nonclass']['step'] = 1;
$this->_sections['nonclass']['start'] = $this->_sections['nonclass']['step'] > 0 ? 0 : $this->_sections['nonclass']['loop']-1;
if ($this->_sections['nonclass']['show']) {
    $this->_sections['nonclass']['total'] = $this->_sections['nonclass']['loop'];
    if ($this->_sections['nonclass']['total'] == 0)
        $this->_sections['nonclass']['show'] = false;
} else
    $this->_sections['nonclass']['total'] = 0;
if ($this->_sections['nonclass']['show']):

            for ($this->_sections['nonclass']['index'] = $this->_sections['nonclass']['start'], $this->_sections['nonclass']['iteration'] = 1;
                 $this->_sections['nonclass']['iteration'] <= $this->_sections['nonclass']['total'];
                 $this->_sections['nonclass']['index'] += $this->_sections['nonclass']['step'], $this->_sections['nonclass']['iteration']++):
$this->_sections['nonclass']['rownum'] = $this->_sections['nonclass']['iteration'];
$this->_sections['nonclass']['index_prev'] = $this->_sections['nonclass']['index'] - $this->_sections['nonclass']['step'];
$this->_sections['nonclass']['index_next'] = $this->_sections['nonclass']['index'] + $this->_sections['nonclass']['step'];
$this->_sections['nonclass']['first']      = ($this->_sections['nonclass']['iteration'] == 1);
$this->_sections['nonclass']['last']       = ($this->_sections['nonclass']['iteration'] == $this->_sections['nonclass']['total']);
?>
								<dd><img class="tree-icon" src="<?php echo $this->_tpl_vars['subdir']; ?>
media/images/Page.png" alt="File"><a href='<?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['files'][$this->_sections['nonclass']['index']]['link']; ?>
' target='right'><?php echo $this->_tpl_vars['info'][$this->_sections['p']['index']]['files'][$this->_sections['nonclass']['index']]['title']; ?>
</a></dd>
							<?php endfor; endif; ?>
						<?php endif; ?>
					</dl>
				</dd>
								
			<?php endif; ?>
			
		<?php endfor; endif; ?>
	</dl>
</div>
<p class="notes"><a href="<?php echo $this->_tpl_vars['phpdocwebsite']; ?>
" target="_blank">phpDocumentor v <span class="field"><?php echo $this->_tpl_vars['phpdocversion']; ?>
</span></a></p>
</BODY>
</HTML>