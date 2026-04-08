from django.db import models

from plans.models import Plan


# Create your models here.
class Member(models.Model):
    plan = models.ForeignKey(Plan, on_delete=models.CASCADE, default=1)
    first_name = models.CharField(max_length=255)
    last_name = models.CharField(max_length=255)
    phone = models.IntegerField(null=True)
    joined_date = models.DateField(null=True)
    picture = models.CharField(max_length=100, null=True)

    def __str__(self):
        return f'{self.first_name} {self.last_name}'