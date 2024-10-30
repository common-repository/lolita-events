<?php
echo $before_widget;
if ( ! empty( $title ) ) {
	echo $before_title . $title . $after_title;
}
?>
<lf-events></lf-events>
<?php
echo $after_widget;
