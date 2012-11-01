require 'haml'
require 'sinatra'

get '/' do
  haml :index
end

post '/result' do
  haml :result
end
