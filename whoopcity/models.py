from django.db import models
from django.contrib.auth.models import User, UserManager

class Team(models.Model):
  """
  school_name (string)
  name (string)
  level (highschool, club, juniorcollege, college, pro)
  division (tinyint)
  description (text)
  record
  playstyle
  """
  school_name = models.CharField(max_length=30)
  name = models.CharField(max_length=50)
  division = models.IntegerField()

  def __unicode__(self):
    return self.school_name


class Player(User):
  team = models.ForeignKey(Team)
  games_played = models.IntegerField()

