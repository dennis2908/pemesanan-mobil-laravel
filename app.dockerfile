FROM katalyn4me/laravel58
ENV NODE_ENV=production
WORKDIR /usr/src/app
COPY ["composer.json", "composer.lock*", "./"]
RUN composer update
RUN php key generate
COPY . .
EXPOSE 8080
RUN chown -R node /usr/src/app
USER node
CMD ["npm", "start"]
