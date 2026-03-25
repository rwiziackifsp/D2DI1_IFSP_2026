from django.http import HttpResponse
from django.shortcuts import render
from .models import Equipment # novo adicionado para importar a Model dos equipamentos
from django.template import loader # novo adicionado para renderizar o template


# Create your views here.
def equipments(request):
    my_equipments = Equipment.objects.all().values()
    template = loader.get_template('all_equipments.html')
    context = {'my_equipments': my_equipments,}
    return HttpResponse(template.render(context, request))

def details(request, id):
    equipment = Equipment.objects.get(id=id)
    template = loader.get_template('details_eqp.html')
    context = {'equipment': equipment,}
    return HttpResponse(template.render(context, request))
