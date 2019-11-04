(function() {

    App.pages.home = function() {
        var s = $('#s'),
            sFavorites = $('#s-favorites'),
            favoriteIds = sFavorites.attr('href').split(';'),
            container = $('.api_content'),
            typingInterval = 1000,
            typingTimer;

        s.parent().on('submit', function(e) {
            e.preventDefault();
            s.focusout();
        }).on('keyup', function(e) {
            clearTimeout(typingTimer);

            if (13 === e.which) {
                container.empty();

                App.modules.marvelApi.search('getCharacters', {
                    nameStartsWith: s.val()
                });
            } else {
                if (s.val()) {
                    typingTimer = setTimeout( function() {
                        container.empty();
                        
                        App.modules.marvelApi.search('getCharacters', {
                            nameStartsWith: s.val()
                        });
                    }, typingInterval);
                }
            }
        });

        sFavorites.on('click', function(e) {
            e.preventDefault();

            container.empty();

            favoriteIds.forEach( function(e) {
                App.modules.marvelApi.search('getCharacter', {
                    characterId: e
                });
            });
        });
    };

    App.modules.marvelApi = {
        search: function(method = 'getCharacters', params = {}) {
            $('.loader').show();

            $.ajax({
                method: "POST",
                url: App.baseUrl + 'includes/ajaxrequest.php',
                dataType: 'json',
                data: {
                    params: params,
                    method: method
                }
            }).done(function(r) {
                if (r.code == 200 && typeof r.data != 'undefined') {
                    if (r.data.total > 0) {
                        App.modules.marvelApi.show(r.data.results);
                    } else {
                        App.modules.marvelApi.error({message: "No characters found"});    
                    }
                } else {
                    App.modules.marvelApi.error(r);
                }
            }).fail(function(jqXHR, textStatus) {
                alert(textStatus);
            }).always(function() {
                $('.loader').hide();
            });
        },

        show: function(data) {
            App.modules.templateHtml('#charactersTemplate', data, '.api_content');
        },

        error: function(data) {
            App.modules.templateHtml('#errorTemplate', data, '.api_content');
        }
    };

    App.modules.templateHtml = function(templateId, data, container) {
        var tmpl = $.templates(templateId),
            html = tmpl.render(data);

        $(container).append(html);
    }
}).call(this);
