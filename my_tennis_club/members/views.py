from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader

from members.models import Member

from .models import Member


# Create your views here.
def members(request):
    mymembers = Member.objects.all().values()
    template = loader.get_template('all_members.html')
    context = {
        'mymembers': mymembers,
    }
    return HttpResponse(template.render(context, request))

def details(request, id):
    mymembers = Member.objects.get(id=id)
    template = loader.get_template('details.html')
    context = {
        'mymembers': mymembers,
    }
    return HttpResponse(template.render(context, request))


    # template = loader.get_template('myfirst.html')
    # return HttpResponse("<h1>Hello world!</h1>") # http://127.0.0.1:8000/members abre isso
    # return HttpResponse(template.render()) # http://127.0.0.1:8000/members abre/renderiza o conteúdo html