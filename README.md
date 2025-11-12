App for tracking and managing crypto portfolios

Important Changes To Database:
- Uppon further inspection, it seems that the crypto_chain_wallets is redundant, and can be removed.
- Now, the user_wallets_id is used to link uses-wallet information with crypto_chain table in user_balances table.
- Now, wallets table holds the private key for the wallet and chain_id for the chain to remove redundancy when searching for wallet chains.

New Structure looks like this: (screenshot of the database is provided here and in png format and also .sql file.):
