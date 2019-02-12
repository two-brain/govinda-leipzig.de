$(document).on('click', '.imageannotator-img', function(e) {
	var _this = $(this),
		_ctn = _this.parent(),
		_x = e.pageX,
		_y = e.pageY;

	var _coordinates = propCoordinates(_this, _x, _y),
		_x = _coordinates.x,
		_y = _coordinates.y,
		_index = _ctn.find('.imageannotator-marker').length + 1,
		_id = uniqueId();

	var _marker = $('<div class="imageannotator-marker grabbable"></div>');
		_marker.attr('data-id', _id);
		_marker.attr('data-x', _x);
		_marker.attr('data-y', _y);
		_marker.html('<span>'+ _index +'</span>');
		_marker.css({
			left: _x * 100 +'%',
			top: _y * 100 +'%'
		});

	_ctn.append(_marker);

	// Open the modal
	app.modal.open(_ctn.attr('href'));
});

// Make markers draggable
var initDraggableMarkers = function() {
	$('.imageannotator-img').each(function() {
		var _this = $(this),
			_ctn = _this.parent(),
			_type = _ctn.attr('data-type'),
		    _filename = _ctn.attr('data-filename'),
			_markers = _ctn.find('.imageannotator-marker'),
			_markerHalf = _markers.first().width() / 2;

		// Make pins draggable
		_markers.draggable({
			containment: 'body',
		    stop: function() {
		        var _marker = $(this),
		        	_uid = _marker.attr('data-uid'),
		        	_fieldname = _marker.attr('data-fieldname'),
					_markerId = _marker.attr('data-id'),
					_markerPos = _marker.offset(),
					_coordinates = propCoordinates(_this, _markerPos.left, _markerPos.top),
					_x = _coordinates.x, 
					_y = _coordinates.y;

				_marker.css({
					left: _x * 100 + '%',
					top: _y * 100 + '%',
				});
				_marker.attr('data-x', _x);
				_marker.attr('data-y', _y);

				updateCoordinates(_uid, _type, _filename, _fieldname, _markerId, _x, _y);
		    }
		});
	});
};

// Update the coordinates of a specific structure entry
var updateCoordinates = function(_uid, _type, _filename, _fieldname, _id, _x, _y) {
	$.ajax({
        type: 'post',
        url: 'imageannotator/update-coordinates',
        data: {
        	uid: _uid,
        	type: _type,
        	fieldname: _fieldname,
        	filename: _filename,
        	id: _id,
        	x: _x,
        	y: _y
        },
        success: function(data) {},
        error: function (xhr, ajaxOptions, thrownError) {}
    });
};

// Formatting the coordinates
var propCoordinates = function(_parent, _x, _y) {
	var _parentLeft = _parent.offset().left,
		_parentTop = _parent.offset().top - $(window).scrollTop(),
		_parentW = _parent.width(),
		_parentH = _parent.height();

	var _x = _x - _parentLeft,
		_y = _y - _parentTop,
		_propX = _x / _parentW,
		_propY = _y / _parentH;

	_propX = Math.max(_propX, 0);
	_propX = Math.min(_propX, 1);
	_propY = Math.max(_propY, 0);
	_propY = Math.min(_propY, 1);

	return {x: _propX, y: _propY};
};

// Generates a uniqueId
var uniqueId = function() {
    return Math.round(new Date().getTime() + (Math.random() * 100));
};


(function($) {

  var Structure = function(el) {

    var element  = $(el);
    var style    = element.data('style');
    var api      = element.data('api');
    var sortable = element.data('sortable');
    var entries  = style == 'table' ? element.find('.structure-table tbody') : element.find('.structure-entries');

    if(sortable === false) return false;

    entries.sortable({
      helper: function(e, ui) {
        ui.children().each(function() {
          $(this).width($(this).width());
        });
        return ui.addClass('structure-sortable-helper');
      },
      update: function() {

        var ids = [];

        $.each($(this).sortable('toArray'), function(i, id) {
          ids.push(id.replace('structure-entry-', ''));
        });

        $.post(api, {ids: ids}, function() {
          app.content.reload();
        });

      }
    });

  };

  $.fn.imageannotator = function() {

    return this.each(function() {

      if($(this).data('structure')) {
        return $(this);
      } else {
        var structure = new Structure(this);
        $(this).data('structure', structure);
        return $(this);
      }

    });
  };
})(jQuery);