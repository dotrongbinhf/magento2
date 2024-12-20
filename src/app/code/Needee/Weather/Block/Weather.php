<?php
namespace Needee\Weather\Block;

use \Magento\Framework\View\Element\Template;

class Weather extends Template
{
    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data
    */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->setCacheLifetime(false);
     }

    /**
     * @return Post[]
    */
    public function getArticles()
    {
        return 'getArticles function of the Block class called successfully';
    }
}
?>