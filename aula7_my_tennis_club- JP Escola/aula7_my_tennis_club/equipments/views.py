from django.http import HttpResponse
from django.template import loader
from equipments.models import Equipment

def equipments(request):
    itens = Equipment.objects.all().values()
    template = loader.get_template("all_equipments.html")
    context = {
        "itens": itens
    }
    return HttpResponse(template.render(context, request))
