from django.db import models

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


class Player(models.Model):
  team = models.ForeignKey(Team)
  first_name = models.CharField(max_length=30)
  last_name = models.CharField(max_length=30)
  games_played = models.IntegerField()

