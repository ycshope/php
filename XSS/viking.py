import math

prime_num = 2
for prime in range(3, 10):
    # print(f"prime={prime}")
    max_divde = math.floor(math.sqrt(prime))
    # print(f"max_divde={max_divde}")
    divde_num = 0
    for j in range(1, max_divde + 1):
        if (prime % j == 0):
            divde_num += 1
        if (prime > 2):
            print(f"{prime} is not a prime number!")
            break
    # for i in range(1,math.floor(math.sqrt(prime))):
    #     print(f"i={i}")

    # for j in range(1,int(math.sqrt(prime+1))):
    #     print(j)
