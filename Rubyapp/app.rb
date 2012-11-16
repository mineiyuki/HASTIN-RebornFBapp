# encoding: utf-8
require 'haml'
require 'rubygems'
require 'sinatra'

get '/question' do

  @q1 = "どちらが好きですか？"
  @a1 = "mountain"
  @a2 = "ocean"

  haml :question

end


post '/result' do

  if params[:first] == "0" then
    @type= "山ガール"
    @explain= "富士山池"
  else
    @type= "海ガール"
    @explain= "太平洋池"
  end


  haml :result

end
