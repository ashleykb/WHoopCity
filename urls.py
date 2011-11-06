from django.conf.urls.defaults import *
import settings

from django.contrib.auth.views import login, logout

# Uncomment the next two lines to enable the admin:
from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
	(r'^media/(?P<path>.*)$', 'django.views.static.serve', {'document_root': settings.MEDIA_ROOT}),
	(r'^$', 'whoopcity.views.index'),
	(r'^index$', 'whoopcity.views.index'),
	(r'^login/?$', login, dict(template_name='index.html')),
	(r'^logout/?$', logout, dict(next_page='/index')),
	(r'^about$', 'whoopcity.views.about'),
	(r'^contact$', 'whoopcity.views.contact'),
	(r'^register$', 'whoopcity.views.register'),
	(r'^players/profile$', 'whoopcity.views.player_profile'),
	(r'^players/profile_edit$', 'whoopcity.views.player_profile_edit'),
	(r'^players/p_about$', 'whoopcity.views.player_p_about'),
	(r'^players/p_exprofile$', 'whoopcity.views.player_p_exprofile'),
	(r'^players/collegesearch$', 'whoopcity.views.player_collegesearch'),
	(r'^teams/a_about$', 'whoopcity.views.team_a_about'),
	(r'^teams/a_exprofile$', 'whoopcity.views.team_a_exprofile'),
	(r'^teams/c_about$', 'whoopcity.views.team_c_about'),
	(r'^teams/c_exprofile$', 'whoopcity.views.team_c_exprofile'),
	#(r'^teams/ex_playersearch$', 'whoopcity.views.team_ex_playersearch'),
	# (r'^teams/ex_calendar_index$', 'whoopcity.views.team_ex_calendar_index'),
	#(r'^teams/playersearch$', 'whoopcity.views.team_playersearch'),
	(r'^teams/profile_edit$', 'whoopcity.views.team_profile_edit'),
	(r'^teams/profile$', 'whoopcity.views.team_profile'),


    # url(r'^mysite/', include('mysite.foo.urls')),

    # Uncomment the admin/doc line below to enable admin documentation:
    # url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    (r'^admin/', include(admin.site.urls)),
)
