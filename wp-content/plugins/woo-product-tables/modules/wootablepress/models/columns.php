<?php
class ColumnsModelWtbp extends ModelWtbp {
	public $enabledColumns = array('thumbnail', 'product_title', 'featured', 'sku', 'categories', 'description', 'short_description', 'product_link', 'reviews', 'stock', 'date', 'price', 'add_to_cart', 'downloads', 'sale_dates');
	public function __construct() {
		$this->_setTbl('columns');
		$this->enabledColumns = DispatcherWtbp::applyFilters('getEnabledColumns', $this->enabledColumns);
	}
	public function addEnabledColumns( $columns ) {
		$this->enabledColumns = array_merge($this->enabledColumns, $columns);
	}
	public function getFullColumnList() {
		$columns = $this->setOrderBy('columns_order')->getFromTbl();
		$proVersion = FrameWtbp::_()->getProVersion();
		$removeCols = array();
		if (false !== $proVersion && version_compare($proVersion, '1.1.7', '<')) {
			$removeCols['sales'] = 1;
		}

		$productAttr = wc_get_attribute_taxonomies();
		$list = array();
		foreach ($columns as $column) {
			$slug = $column['columns_name'];
			if (isset($removeCols[$slug])) {
				continue;
			}

			$enabled = in_array($slug, $this->enabledColumns);
			if ('attribute' == $slug) {
				$list[] = array('slug' => $slug, 'name' => $column['columns_nice_name'], 'is_enabled' => $enabled, 'is_default' => $column['is_default'], 'sub' => 0, 'class' => '', 'type' => 'attribute');
				foreach ($productAttr as $attr) {
					$list[] = array('slug' => $slug . '-' . $attr->attribute_id, 'name' => $attr->attribute_label, 'is_enabled' => $enabled, 'is_default' => 0, 'sub' => 1, 'class' => '', 'type' => 'attribute');
				}
			} else {
				$list[] = array('slug' => $slug, 'name' => $column['columns_nice_name'], 'is_enabled' => $enabled, 'is_default' => $column['is_default'], 'sub' => 0, 'class' => '');
			}
		}
		return DispatcherWtbp::applyFilters('addFullColumnList', $list);
	}
}
