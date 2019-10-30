(function() {

    App.pages.home = function($) {
        var s;

        $('.show_more').on('click', function(e) {
            e.preventDefault();

            App.modules.marvelApi.paged++;
            App.modules.templateHtml(App.modules.marvelApi.paged);

            $('input', $(this)).attr('checked', false);

            if (App.modules.marvelApi.paged === App.modules.marvelApi.totalPages) {
                return $('.show_more').fadeOut();
            }
        });

        s = $('#s');
        s.parent().submit(function(e) {
            e.preventDefault();
            return s.focusout();
        }).keypress(function(e) {
            if (13 === e.which) {
                App.modules.marvelApi.search(s.val());
            }
            if (s.val().length > 5) {
                return App.modules.marvelApi.search(s.val());
            }
        });

        $.template('charactersTemplate', App.templates.characterMarkup);
        return App.modules.marvelApi.sort();
    };

    App.modules.marvelApi = {
        search = function(val) {
            return $.ajax({
                method: "GET",
                url: '//netflixroulette.net/api/api.php',
                data: {
                    actor: val
                }
            }).done(function(r) {
                var itens;
                itens = jQuery('.api_content');
                movies.empty();
                App.modules.marvelApi.show(r);
                return $('.api_order').fadeIn(400, function() {
                    $('input', $(this)).attr('checked', false);
                    return $('.show_more').fadeIn();
                });
            }).fail(function(r) {
                return alert(r.responseJSON.message);
            }).always(function() {});
        },

        sort = function() {
            return $(".api_content'").mixItUp({
                layout: {
                    containerClass: 'list'
                }
            });
        },

        show = function(data) {
            var count, f, i, l, s;
            count = data.length;
            i = 1;
            l = Math.ceil(count / 5);
            this.totalPages = l;
            while (i <= l) {
                f = i - 1;
                s = i === l ? count : i * 5;
                this.showMovies[i] = data.slice(f * 5, s);
                i++;
            }
            this.paged = 1;
            return this.templateHtml(1);
        },

        App.modules.templateHtml = function(page) {
            console.log(page);
            return $.tmpl('movieTemplate', this.show([page]).appendTo('#movies');
        }
    }
}).call(this);
