

%%function to calculate maclaurin function

function result = maclaurin(n,a)
	vec = [1:n];
	term = [1];
    term = [term,(1./vec)*(a.^vec)];
	total = [cumsum(term)];
	
    trueval = exp(a);
    err = 	[abs(trueval-total)];
	
end