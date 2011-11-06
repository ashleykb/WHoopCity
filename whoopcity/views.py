from django.template import RequestContext
from django.template import Context, loader
from django.shortcuts import redirect, render_to_response
from whoopcity.models import Team
from django.contrib.auth import authenticate, login
from django.core.urlresolvers import reverse
from django.http import HttpResponseRedirect

#def logout(request):
#    return None
#   
#def login(request):
#    if request.method == 'GET':
#        HttpResponseRedirect('index')
#      
#    username = request.POST['username']
#    password = request.POST['password']
#    user = authenticate(username=username, password=password)
#    if user is not None and user.is_active:
#    	login(request, user)
#    	return render_to_response('/index.html', {
#    		'message': "grats, you're logged in :P",
#    	}, context_instance=RequestContext(request))
#    else:
#    	return render_to_response('/index.html', {
#    		'message': "ah poop, wrong username and/or password",
#    	}, context_instance=RequestContext(request))


def index(request):
  return render_to_response(
  	'index.html',
  	context_instance=RequestContext(request)
  )	
  
def register(request):
  return render_to_response(
  	'register.html',
  	context_instance=RequestContext(request)
  )	

def about(request):
  return render_to_response(
  	'about.html',
  	context_instance=RequestContext(request)
  )	
    
def contact(request):
  return render_to_response(
  	'contact.html',
  	context_instance=RequestContext(request)
  )	
  
# def person_data(request):
#  person = Person.objects.get(city__contains="San Francisco")
#  return render_to_response(
#   'players/profile.html', {'city': city}
#  )

def player_profile(request):
  return render_to_response(
  	'players/profile.html',
  	context_instance=RequestContext(request)
  )			

def player_profile_edit(request):
  return render_to_response(
  	'players/profile_edit.html',
  	context_instance=RequestContext(request)
  )			

def player_p_about(request):
  return render_to_response(
  	'players/p_about.html',
  	context_instance=RequestContext(request)
  )			

def player_p_exprofile(request):
  return render_to_response(
  	'players/p_exprofile.html',
  	context_instance=RequestContext(request)
  )		

def player_collegesearch(request):
  return render_to_response(
  	'players/collegesearch.html',
  	context_instance=RequestContext(request)
  )			
    
def team_a_about(request):
  return render_to_response(
  	'teams/a_about.html',
  	context_instance=RequestContext(request)
  )	
  
def team_a_exprofile(request):
  return render_to_response(
  	'teams/a_exprofile.html',
  	context_instance=RequestContext(request)
  )	
  
def team_c_about(request):
  return render_to_response(
  	'teams/c_about.html',
  	context_instance=RequestContext(request)
  )	
  
def team_c_exprofile(request):
  return render_to_response(
  	'teams/c_exprofile.html',
  	context_instance=RequestContext(request)
  )	
  
def team_profile(request):
  return render_to_response(
  	'teams/profile.html',
  	context_instance=RequestContext(request)
  )	
  
def team_profile_edit(request):
  return render_to_response(
  	'teams/profile_edit.html',
  	context_instance=RequestContext(request)
  )	
  
def team_playersearch(request):
  return render_to_response(
  	'teams/playersearch.html',
  	context_instance=RequestContext(request)
  )	
  
 # def team_excalendar_index(request):
 # return render_to_response(
 # 	'teams/excalednar_index.html',
 # 	context_instance=RequestContext(request)
 # )	
  
  