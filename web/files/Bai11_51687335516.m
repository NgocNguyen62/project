A = [0 1; -5 -2];
B = [0 1]';
C = [1 0];
x0 = [1 1]';
D = 0;

sys = ss(A,B,C,D);
[ts, ms] = ss2tf(A,B,C,D);
% kiem tra tinh on dinh
eig(sys) % lamda1 = -1.0000 + 2.0000i, lamda2= -1.0000 - 2.0000i
% 2 lamda nay co phan thuc am nen he on dinh


% kiem tra tinh dieu khien duoc
Kc = ctrb(A,B);
n = length(A) % =2
rank(Kc) % =2
% rank(Kc) - n = 0 nen he dieu khien duoc


% Kiem tra tinh quan sat duoc
Ob = obsv(A,C);
Oct = rank(Ob) - n % =0
% Oct = 0 nen he quan sat duoc
