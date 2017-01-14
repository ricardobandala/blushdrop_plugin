function SGQueue() {

}

if(typeof SG_POPUPS_QUEUE == 'undefined') {
	SG_POPUPS_QUEUE = [];
}

SGQueue.queue = SG_POPUPS_QUEUE;
SGQueue.currentId = '';
SGQueue.popupObj = new SGPopup();
SGQueue.queueObj = new SGQueue();

SGQueue.run = function() {
	var popupObj = SGQueue.popupObj;
	var queueObj = SGQueue.queueObj;
	queueObj.bindingForNext();

	var listOfQueue = SGQueue.queue;
	if(typeof listOfQueue == "undefined" || listOfQueue.length == 0) {
		return false;
	}

	SGQueue.currentId = listOfQueue[0];

	var shouldOpen = SGQueue.popupObj.sgPopupShouldOpen(SGQueue.currentId); 

	if(!shouldOpen) {
		queueObj.next();
	}else {
		SGQueue.popupObj.popupOpenOnWindowLoad(SGQueue.currentId);
	}
	//popupObj.popupOpenOnWindowLoad(SGQueue.currentId);

	
}

SGQueue.prototype.next = function() {
	SGQueue.queueObj.removeFromQueueByValue(SGQueue.queue, SGQueue.currentId);
	SGQueue.currentId = SGQueue.queue[0];

	if(typeof SGQueue.currentId == "undefined") {
		return false;
	}
	var shouldOpen = SGQueue.popupObj.sgPopupShouldOpen(SGQueue.currentId); 

	if(!shouldOpen) {
		this.next();
	}else {
		SGQueue.popupObj.popupOpenOnWindowLoad(SGQueue.currentId);
	}
}

SGQueue.prototype.removeFromQueueByValue = function(arr, value) {

	var index = arr.indexOf(value);
	arr.splice(index, 1);

    return arr;
}

SGQueue.prototype.bindingForNext = function() {
	var that = this;

	jQuery('#sgcolorbox').bind("sgPopupClose", function() {
		that.next();
	});
}


jQuery(document).ready(function($) {
	SGQueue.run();
});