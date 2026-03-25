from django.db import models

# Create your models here.

class Equipment(models.Model):
    nome_equipment = models.CharField(max_length=50)
    modelo_equipment = models.CharField(max_length=255)
    quantidade_equipment = models.IntegerField(null=True)
    aluguel = models.FloatField(null=True)
