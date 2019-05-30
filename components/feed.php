<?php 
	class rss2 extends DOMDocument{
		private $channel;
		
		public function __construct($title,$link,$description){
			parent::__construct();
			$this->formatOutput = true;
			
			$root = $this->appendChild($this->createElement('rss'));
			$root->setAttribute('version','2.0');
			
			$channel = $root->appendChild($this->createElement('channel'));
			
			$channel->appendChild($this->createElement('title',$title));
			$channel->appendChild($this->createElement('link',$link));
			$channel->appendChild($this->createElement('description',$description));
			
			
			$this->channel = $channel;
			
		}
		
		
		public function addItem($title,$link,$description,$pubDate){
			$item = $this->createElement('item');
			$item->appendChild($this->createElement('title',$title));
			$item->appendChild($this->createElement('link',$link));
			$item->appendChild($this->createElement('description',$description));
			$item->appendChild($this->createElement('pubDate',$pubDate));
			
			$this->channel->appendChild($item);
		}
	}
	
	
class atom1 extends DOMDocument {
    private $ns;

    public function __construct($title, $href, $name, $id) {
        parent::__construct();
        $this->formatOutput = true;

        $this->ns = 'http://www.w3.org/2005/Atom';

        $root = $this->appendChild($this->createElementNS($this->ns, 'feed'));

        $root->appendChild($this->createElementNS($this->ns, 'title', $title));
        $link = $root->appendChild($this->createElementNS($this->ns, 'link'));
        $link->setAttribute('href', $href);
        $root->appendChild($this->createElementNS($this->ns, 'updated',
            date('Y-m-d\\TH:i:sP')));
        $author = $root->appendChild($this->createElementNS($this->ns, 'author'));
        $author->appendChild($this->createElementNS($this->ns, 'name', $name));
        $root->appendChild($this->createElementNS($this->ns, 'id', $id));
    }

    public function addEntry($title, $link, $summary) {
        $entry = $this->createElementNS($this->ns, 'entry');
        $entry->appendChild($this->createElementNS($this->ns, 'title', $title));
        $entry->appendChild($this->createElementNS($this->ns, 'link', $link));

        $id = uniqid('http://wuya.me/atom/entry/ids/');
        $entry->appendChild($this->createElementNS($this->ns, 'id', $id));

        $entry->appendChild($this->createElementNS($this->ns, 'updated',
            date(DATE_ATOM)));			
		
        $entry->appendChild($this->createElementNS($this->ns, 'summary', $summary));

		
        $this->documentElement->appendChild($entry);
    }
}

?>